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

import { useSelect } from "@wordpress/data";

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
	//  const postTypeSlug = "project";
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

	const postTypes = useSelect((select) => {
		return select("core").getPostTypes();
	}, []);
	console.log("postTypes", postTypes);

	const postTypeProject = useSelect((select) => {
		return select("core").getPostType("project");
	}, []);
	console.log("postTypeProject", postTypeProject);

	const theSettings = useSelect((select) => {
		return select("core/block-editor").getSettings();
	}, []);
	console.log("theSettings", theSettings);
	// output: wp_template

	const theEditedPostType = useSelect((select) => {
		return select("core/edit-site").getEditedPostType();
	}, []);
	console.log("theEditedPostType", theEditedPostType);

	// this is it!!!!
	const theEditedPostId = useSelect((select) => {
		return select("core/edit-site").getEditedPostId();
	}, []);
	console.log("theEditedPostId", theEditedPostId);
	// output: awforgtheme//single-project

	const theEditedSettings = useSelect((select) => {
		return select("core/edit-site").getSettings();
	}, []);
	console.log("theEditedSettings", theEditedSettings);

	const theEditorMode = useSelect((select) => {
		return select("core/edit-site").getEditorMode();
	}, []);
	console.log("theEditorMode", theEditorMode);

	const theCurrentPostType = useSelect((select) => {
		return select("core/editor").getCurrentPostType();
	}, []);
	console.log("theCurrentPostType", theCurrentPostType);

	/*
	 * this works great, next example digs deeper into what we need
	
	const currentURL = window.location.href;
	const urlObject = new URL(currentURL);
	console.log("urlObject", urlObject);
	// Get the search (query) part of the URL
	const search = window.location.search;
	console.log("search only", search);

	// Remove the leading "?" character
	const searchWithoutQuestionMark = search.slice(1);

	// Split the search string by "&" to get an array of query parameter strings
	const queryParamStrings = searchWithoutQuestionMark.split("&");

	// Create an empty object to store the extracted query parameters
	const queryParams = {};

	// Loop through each query parameter string and extract the key-value pairs
	queryParamStrings.forEach((paramString) => {
		const [key, value] = paramString.split("=");
		queryParams[key] = decodeURIComponent(value);
	});

	console.log("Query Parameters:", queryParams);
	*/

	//
	//
	// break down PostId
	//
	//

	// Get the search (query) part of the URL
	const search = window.location.search;

	// Remove the leading "?" character
	const searchWithoutQuestionMark = search.slice(1);

	// Split the search string by "&" to get an array of query parameter strings
	const queryParamStrings = searchWithoutQuestionMark.split("&");

	// Create an empty object to store the extracted query parameters
	const queryParams = {};

	// Loop through each query parameter string and extract the key-value pairs
	queryParamStrings.forEach((paramString) => {
		const [key, value] = paramString.split("=");
		queryParams[key] = decodeURIComponent(value);
	});

	// Extract the postId from the queryParams object
	const postId = queryParams.postId;

	// Split the postId value by slashes to extract individual parts
	const postIdParts = postId.split("/");

	console.log("postIdParts:", postIdParts);

	/*
	 * output to last example
	postIdParts: 
Array(3) [ "awforgtheme", "", "single-project" ]
0: "awforgtheme"
1: ""
2: "single-project"
	 */

	/*
	 * don't work while editing template `single-project` for example
	 * 
	const theCollections = useSelect((select) => {
		return select("core/blocks").getCollections(true);
	}, []);
	console.log("theCollections", theCollections);
	
	const theTemplate = useSelect((select) => {
		return select("core/editor").getTemplate();
	}, []);
	console.log("theTemplate", theTemplate);

	const theMeta = useSelect((select) => {
		return select("core/editor").getEditedPostAttribute("meta");
	}, []);
	console.log("theMeta", theMeta);

	const thePermalink = useSelect((select) => {
		return select("core/editor").getPermalink();
	}, []);
	console.log("thePermalink", thePermalink);


	
	 */

	// Get information about all registered custom post types
	/*
	const postTypes = select("core").getPostTypes();
	console.log("postTypes", postTypes);
	const theMeta = select("core/editor").getEditedPostAttribute("meta");
	console.log("theMeta", theMeta);
	*/

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
