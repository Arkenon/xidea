import {__} from '@wordpress/i18n';
import I18n from "../../inc/I18n/I18nBlockOptions.json";
import {
	ToggleControl,
	RangeControl,
	Panel,
	PanelBody,
	PanelRow
} from '@wordpress/components';

const InputSettings = ({options}) => {

	const {attributes, setAttributes} = options;

	return (
		<Panel>
			<PanelBody
				title={__(I18n.input_settings_panel_title.text, 'flwgb')}
				initialOpen={false}
			>
				<PanelRow>
					<RangeControl
						label={__(I18n.input_border_radius_text.text, 'flwgb')}
						value={attributes.inputBorderRadius}
						onChange={(val) =>
							setAttributes({inputBorderRadius: val})
						}
						min={0}
						max={25}
					/>
				</PanelRow>
				<PanelRow>
					<ToggleControl
						label={__(I18n.show_placeholders_text.text, 'flwgb')}
						help={attributes.showPlaceholders ? 'Show' : 'Hide'}
						checked={attributes.showPlaceholders}
						onChange={(val) =>
							setAttributes({showPlaceholders: val})
						}
					/>
				</PanelRow>
			</PanelBody>
		</Panel>
	)

}

export default InputSettings;
