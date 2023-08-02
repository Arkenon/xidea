import './editor.scss';
import {useBlockProps} from '@wordpress/block-editor';
import {__} from '@wordpress/i18n';
import I18n from "../../inc/I18n/I18n.json";

export default function Edit(props) {

	const blockProps = useBlockProps(props);

	return (

		<div {...blockProps}>

			{__(I18n.user_activation_block_description.text,'flwgb')}

		</div>

	);
}
