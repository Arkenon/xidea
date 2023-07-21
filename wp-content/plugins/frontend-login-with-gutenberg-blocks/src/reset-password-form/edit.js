import './editor.scss';
import {useBlockProps} from '@wordpress/block-editor';
import {__} from '@wordpress/i18n';
import I18n from "../../inc/I18n/I18n.json";
import Options from "./options";

export default function Edit(props) {

	const {attributes} = props;

	const blockProps = useBlockProps(props);

	const inputStyle = {
		'border-radius': attributes.inputBorderRadius,
	}

	const textStyle = {
		'color': attributes.textColor,
		'font-weight': attributes.textFontWeight
	}

	const buttonStyle = {
		'color': attributes.buttonTextColor,
		'backgroundColor': attributes.buttonBgColor,
		'border-color': attributes.buttonBorder.color,
		'border-style': attributes.buttonBorder.style,
		'border-width': attributes.buttonBorder.width,
		'border-radius': attributes.buttonBorderRadius,
		'font-weight': attributes.buttonTextFontWeight
	}

	const desc = attributes.description ? attributes.description : I18n.send_reset_request_description.text;

	return (
		<>

			<Options options={props}/>

			<div {...blockProps}>
				{
					attributes.showDescription &&
					<div style={{'text-align': 'center'}}>
						<p>{__(desc)}</p>
					</div>
				}
				<div className="flwgb-form-row">
					<div className="flwgb-input-group">
						{attributes.showLabels &&
						<label className="flwgb-input-label" style={textStyle}
							   htmlFor="flwgb-email">{__('Your e-mail', 'flwgb')}</label>}
						<input className="flwgb-input-control" id="flwgb-email" type="text"
							   style={inputStyle}
							   placeholder={attributes.showPlaceholders && __('Enter your e-mail', 'flwgb')}/>
					</div>
				</div>


				<div className="flwgb-form-row">
					<button style={buttonStyle} type="submit" name="wp-submit" id="wp-submit"
							className="flwgb-reset-password-btn flwgb-btn">
						{__('Send Request', 'flwgb')}
					</button>
				</div>

			</div>

		</>

	);
}
