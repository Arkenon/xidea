/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from '@wordpress/block-editor';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
export default function Edit() {

	const inputStyle = {
		'width': '100%',
		'border-radius': '0px',
		'margin-bottom': '10px'
	}

	return (
		<>
			<div { ...useBlockProps() }>

				<div className="flwgb-form-row">
					<div className="flwgb-input-group">
						<input type="text" style={inputStyle} placeholder="...write placeholder..." />
							<div className="flwgb-invalid-feedback">
							</div>
					</div>
				</div>

				<div className="flwgb-form-row">
					<div className="flwgb-input-group">
						<input type="text" style={inputStyle} className="flwgb-form-control" placeholder="...write placeholder..." />
						<div className="flwgb-invalid-feedback">
						</div>
					</div>
				</div>

				<div className="flwgb-form-row">
					<div className="flwgb-input-group">
						<input checked="checked" type="checkbox" className="form-check-input"/>
						<label htmlFor="">Remember me</label>
						<div className="flwgb-invalid-feedback">
						</div>
					</div>
				</div>

				<div className="text-center">
					<button type="submit" name="wp-submit" id="wp-submit"
							className="flwgb-btn">Submit
					</button>
				</div>

			</div>
		</>
	);
}
