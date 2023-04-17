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
import { SelectControl, PanelBody } from "@wordpress/components";

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

export default function Edit({
	attributes: { selectedPostType, selectedPostField },
	setAttributes,
}) {
	const [customPosts, setCustomPosts] = useState([]);
	const [customPostFields, setCustomPostFields] = useState([]);

	// console.log("selectedPostType", selectedPostType);
	// console.log("customPostField", customPostField);

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

	// Fetch post meta fields for selectedPostType
	useEffect(() => {
		if (selectedPostType === "page" || selectedPostType === "post") {
			console.log("no meta for post or page type");
		} else {
			apiFetch({ path: `/wp/v2/${selectedPostType}` })
				.then((response) => {
					const postTypeFieldKeys = Object.keys(response[0].meta);
					// console.log("postTypeFieldKeys Meta", postTypeFieldKeys);
					setCustomPostFields(postTypeFieldKeys);
				})
				.catch((error) => {
					console.error(error);
				});
		}
	}, [selectedPostType]);

	return (
		<div {...useBlockProps()}>
			{console.log("spf: ", selectedPostField)}
			<span>This is {selectedPostField}</span>
			<InspectorControls>
				<PanelBody title={__("Select any field from any post type")}>
					<SelectControl
						label="Selected Post Type"
						value={selectedPostType}
						options={customPosts.map((customPost) => {
							return { label: customPost.toUpperCase(), value: customPost };
						})}
						onChange={(newPostType) =>
							setAttributes({ selectedPostType: newPostType })
						}
						__nextHasNoMarginBottom
					/>
					<SelectControl
						label="Selected Post Type Field"
						value={selectedPostField}
						options={customPostFields.map((customPostField) => {
							return {
								label: customPostField.toUpperCase(),
								value: customPostField,
							};
						})}
						onChange={(newPostFieldType) =>
							setAttributes({ selectedPostField: newPostFieldType })
						}
						__nextHasNoMarginBottom
					/>
				</PanelBody>
			</InspectorControls>
		</div>
	);
}
