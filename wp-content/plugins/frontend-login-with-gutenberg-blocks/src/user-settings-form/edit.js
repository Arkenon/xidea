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

	return (

		<>

			<Options options={props}/>

			<div {...blockProps}>

				<div className="flwgb-form-row">
					<div className="flwgb-input-group">
						{attributes.showLabels &&
						<label className="flwgb-input-label" style={textStyle}
							   htmlFor="flwgb-user-first-name">{__(I18n.user_first_name_text.text, 'flwgb')}</label>}
						<input className="flwgb-input-control" id="flwgb-user-first-name" type="text"
							   style={inputStyle}
							   placeholder={attributes.showPlaceholders && __(I18n.user_first_name_placeholder_text.text, 'flwgb')}/>
					</div>
				</div>

				<div className="flwgb-form-row">
					<div className="flwgb-input-group">
						{attributes.showLabels &&
						<label className="flwgb-input-label" style={textStyle}
							   htmlFor="flwgb-user-last-name">{__(I18n.user_last_name_text.text, 'flwgb')}</label>}
						<input className="flwgb-input-control" id="flwgb-user-last-name" type="text"
							   style={inputStyle}
							   placeholder={attributes.showPlaceholders && __(I18n.user_last_name_placeholder_text.text, 'flwgb')}/>
					</div>
				</div>

				<div className="flwgb-form-row">
					<div className="flwgb-input-group">
						{attributes.showLabels &&
						<label className="flwgb-input-label" style={textStyle}
							   htmlFor="flwgb-user-website">{__(I18n.user_website_text.text, 'flwgb')}</label>}
						<input className="flwgb-input-control" id="flwgb-user-website" type="text"
							   style={inputStyle}
							   placeholder={attributes.showPlaceholders && __(I18n.user_website_placeholder_text.text, 'flwgb')}/>
					</div>
				</div>

				<div className="flwgb-form-row">
					<div className="flwgb-input-group">
						{attributes.showLabels &&
						<label className="flwgb-input-label" style={textStyle}
							   htmlFor="flwgb-user-bio">{__(I18n.user_bio_text.text, 'flwgb')}</label>}
						<textarea className="flwgb-textarea-control" name="flwgb-user-bio" id="flwgb-user-bio" cols="30" rows="10">
							{attributes.showPlaceholders && __(I18n.user_bio_placeholder_text.text, 'flwgb')}
						</textarea>
					</div>
				</div>

				<div className="flwgb-form-row">
					<div className="flwgb-input-group">
						{attributes.showLabels &&
						<label className="flwgb-input-label" style={textStyle}
							   htmlFor="flwgb-email-update">{__(I18n.email_input_text.text, 'flwgb')}</label>}
						<input className="flwgb-input-control" id="flwgb-email-update" type="text"
							   style={inputStyle}
							   placeholder={attributes.showPlaceholders && __(I18n.email_placeholder_text.text, 'flwgb')}/>
					</div>
				</div>

				<div className="flwgb-form-row">
					<div className="flwgb-input-group">
						{attributes.showLabels && <label className="flwgb-input-label" style={textStyle}
														 htmlFor="flwgb-current-password">{__(I18n.current_password_input_text.text, 'flwgb')}</label>}
						<input className="flwgb-input-control" id="flwgb-current-password" type="password" style={inputStyle}
							   placeholder={attributes.showPlaceholders && __(I18n.current_password_placeholder_text.text, 'flwgb')}/>
					</div>
				</div>

				<div className="flwgb-form-row">
					<div className="flwgb-input-group">
						{attributes.showLabels && <label className="flwgb-input-label" style={textStyle}
														 htmlFor="flwgb-password-update">{__(I18n.new_password_input_text.text, 'flwgb')}</label>}
						<input className="flwgb-input-control" id="flwgb-password-update" type="password" style={inputStyle}
							   placeholder={attributes.showPlaceholders && __(I18n.new_password_placeholder_text.text, 'flwgb')}/>
					</div>
				</div>

				<div className="flwgb-form-row">
					<div className="flwgb-input-group">
						{attributes.showLabels && <label className="flwgb-input-label" style={textStyle}
														 htmlFor="flwgb-password-again-update">{__(I18n.new_password_again_input_text.text, 'flwgb')}</label>}
						<input className="flwgb-input-control" id="flwgb-password-again-update" type="password" style={inputStyle}
							   placeholder={attributes.showPlaceholders && __(I18n.new_password_again_placeholder_text.text, 'flwgb')}/>
					</div>
				</div>


				<div className="flwgb-form-row">
					<button style={buttonStyle} type="submit" name="wp-submit" id="flwgb-user-settings-submit"
							className="flwgb-update-user-btn flwgb-btn">
						{__(I18n.user_update_button_text.text, 'flwgb')}
					</button>
				</div>

			</div>

		</>

	);
}
