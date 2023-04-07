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

import { TextControl, DatePicker } from "@wordpress/components";

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
	const {
		awebfactory_project_short_name,
		awebfactory_project_description,
		awebfactory_project_start_date,
		awebfactory_project_completion_date,
	} = meta;
	return (
		<div {...useBlockProps()}>
			<h6>{__("Project short name")}</h6>
			<TextControl
				value={awebfactory_project_short_name}
				onChange={(newValue) =>
					updateMeta({ ...meta, awebfactory_project_short_name: newValue })
				}
			/>
			<h6>Start date</h6>
			<DatePicker
				currentDate={awebfactory_project_start_date}
				onChange={(newValue) =>
					updateMeta({ ...meta, awebfactory_project_start_date: newValue })
				}
				__nextRemoveHelpButton
				__nextRemoveResetButton
			/>
			<h6>Estimated completion date</h6>
			<DatePicker
				currentDate={awebfactory_project_completion_date}
				onChange={(newValue) =>
					updateMeta({ ...meta, awebfactory_project_completion_date: newValue })
				}
				__nextRemoveHelpButton
				__nextRemoveResetButton
			/>
			<h6>Project description</h6>
			<RichText
				placeholder={__("Enter project description", "awebfactory")}
				tagName="p"
				value={awebfactory_project_description}
				onChange={(newValue) =>
					updateMeta({
						...meta,
						awebfactory_project_description: newValue,
					})
				}
			/>
		</div>
	);
}
