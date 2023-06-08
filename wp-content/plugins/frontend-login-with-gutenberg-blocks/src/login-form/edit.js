import './editor.scss';
import { useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';

import ControlPanel from './control-panel/controlPanel';

export default function Edit( props ) {
	const {
		attributes: {
			showLabels,
			showPlaceholders,
			textColor,
			textFontWeight,
			inputBorderRadius,
			buttonBgColor,
			buttonTextColor,
			buttonBorder,
			buttonBorderRadius,
			buttonTextFontWeight,
		},
		setAttributes,
	} = props;

	const blockProps = useBlockProps( props );

	const inputStyle = {
		'border-radius': inputBorderRadius,
	};

	const textStyle = {
		color: textColor,
		'font-weight': textFontWeight,
	};

	const buttonStyle = {
		color: buttonTextColor,
		backgroundColor: buttonBgColor,
		'border-color': buttonBorder.color,
		'border-style': buttonBorder.style,
		'border-width': buttonBorder.width,
		'border-radius': buttonBorderRadius,
		'font-weight': buttonTextFontWeight,
	};

	return (
		<>
			<ControlPanel options={ props } />

			<div { ...blockProps }>
				<div className="flwgb-form-row">
					<div className="flwgb-input-group">
						{ showLabels && (
							<label
								className="flwgb-input-label"
								style={ textStyle }
								htmlFor="flwgb-username-or-email"
							>
								{ __( 'Username or E-mail', 'flwgb' ) }
							</label>
						) }
						<input
							className="flwgb-input-control"
							id="flwgb-username-or-email"
							type="text"
							style={ inputStyle }
							placeholder={
								showPlaceholders &&
								__( 'Enter your username or e-mail', 'flwgb' )
							}
						/>
					</div>
				</div>

				<div className="flwgb-form-row">
					<div className="flwgb-input-group">
						{ showLabels && (
							<label
								className="flwgb-input-label"
								style={ textStyle }
								htmlFor="flwgb-password"
							>
								{ __( 'Password', 'flwgb' ) }
							</label>
						) }
						<input
							className="flwgb-input-control"
							id="flwgb-password"
							type="password"
							style={ inputStyle }
							placeholder={
								showPlaceholders &&
								__( 'Enter your password', 'flwgb' )
							}
						/>
					</div>
				</div>

				<div className="flwgb-form-row">
					<div className="flwgb-input-group">
						<input
							id="flwgb-rememberme"
							checked="checked"
							type="checkbox"
							className="flwgb-form-check-input"
						/>
						<label
							className="flwgb-form-check-label"
							style={ textStyle }
							htmlFor="flwgb-rememberme"
						>
							{ __( 'Remember me', 'flwgb' ) }
						</label>
					</div>
				</div>

				<div className="flwgb-form-row">
					<button
						style={ buttonStyle }
						type="submit"
						name="wp-submit"
						id="wp-submit"
						className="flwgb-login-btn flwgb-btn"
					>
						{ __( 'Login', 'flwgb' ) }
					</button>
				</div>
			</div>
		</>
	);
}
