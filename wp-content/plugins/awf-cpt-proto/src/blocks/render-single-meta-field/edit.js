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
	// Replace 'your_post_type_slug' with the slug of your custom post type
	const postTypeSlug = "project";
	let projectMeta = new Array();
	let projectMetaSize = 0;
	const metaKeys = new Set();

	// Fetch the post type's meta keys
	apiFetch({ path: `/wp/v2/project?_fields=meta` })
		.then((posts) => {
			// console.log("prjs", posts);
			posts.forEach((post) => {
				// console.log("post", post);
				Object.keys(post.meta).forEach((metaKey) => {
					metaKeys.add(metaKey);
				});
			});

			// Loop through the meta keys and display the field types
			if (metaKeys.size > 0) {
				// console.log("Custom field types (metaKeys):", metaKeys);
				metaKeys.forEach((metaKey) => {
					// console.log("metakey", metaKey);
					projectMeta[metaKey] = metaKey;
					projectMetaSize = projectMetaSize + 1;
				});
			} else {
				// console.log("No custom fields found for this post type.");
			}
		})
		.catch((error) => {
			console.error(error);
		});
	console.log("projectMeta", projectMeta);
	console.log("projectMeta Size", projectMetaSize);
	return (
		<p {...useBlockProps()}>
			{__(
				"Render Single Meta Field – hello from the editor!",
				"render-single-meta-field"
			)}
			<InspectorControls>Inspector Control scaffolded</InspectorControls>
		</p>
	);
}
