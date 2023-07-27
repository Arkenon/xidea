import './editor.scss';
import {useBlockProps} from '@wordpress/block-editor';


export default function Edit(props) {

	const blockProps = useBlockProps(props);

	return (

		<div {...blockProps}>

			This is a placeholder for USER ACTIVATION BLOCK. To preview the result go to frontend of the page.

		</div>

	);
}
