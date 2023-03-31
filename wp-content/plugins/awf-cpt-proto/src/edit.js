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
import { useBlockProps, RichText } from "@wordpress/block-editor";

/**
 * can be used by the blocks to get or change meta values.
 *
 * @see
 */
import { useEntityProp } from "@wordpress/core-data";

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
export default function Edit({ context: { postType, postId } }) {
	const [meta, updateMeta] = useEntityProp(
		"postType",
		"project",
		"meta",
		postId
	);
	const { description } = meta;
	return (
		<div {...useBlockProps()}>
			<RichText
				placeholder={__("Enter project description", "awebfactory")}
				tagName="p"
				value={description}
				onChange={(newDescriptionContent) =>
					updateMeta({
						...meta,
						description: newDescriptionContent,
					})
				}
			/>
		</div>
	);
}
