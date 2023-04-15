/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from "@wordpress/i18n";

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps, InspectorControls } from "@wordpress/block-editor";

// import { useSelect } from "@wordpress/data";
// Import the WordPress API module
import { useState, useEffect } from "@wordpress/element";
import apiFetch from "@wordpress/api-fetch";

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import "./editor.scss";

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */

export default function Edit() {
	const [customPosts, setCustomPosts] = useState([]);

	// Filters
	const filterByDoesNotStartsWith = (item, doesNotStartsWith) => {
		return !item.toLowerCase().startsWith(doesNotStartsWith.toLowerCase());
	};

	useEffect(() => {
		// Fetch Custom Post Types using apiFetch
		apiFetch({ path: "/wp/v2/types" })
			.then((response) => {
				const postTypeSlugs = Object.keys(response);
				// console.log("All post type slugs:", postTypeSlugs);
				const theCPTs = postTypeSlugs
					.filter((postTypeSlug) =>
						filterByDoesNotStartsWith(postTypeSlug, "wp_")
					)
					.filter((postTypeSlug) =>
						filterByDoesNotStartsWith(postTypeSlug, "nav_")
					)
					.filter((postTypeSlug) => postTypeSlug !== "attachment");
				setCustomPosts(theCPTs);
			})
			.catch((error) => {
				console.error(error);
			});
	}, []);

	return (
		<div {...useBlockProps()}>
			<p>
				{__(
					"Render Single Meta Field – hello from the editor!",
					"render-single-meta-field"
				)}
			</p>
			<ul>
				{customPosts.map((slug) => (
					<li key={slug}>{slug}</li>
				))}
			</ul>
			<InspectorControls>Inspector Control scaffolded</InspectorControls>
		</div>
	);
}
