import {InspectorControls} from '@wordpress/block-editor';
import {
	ToggleControl,
	ColorPicker,
	SelectControl,
	Panel,
	RangeControl,
	PanelBody,
	PanelRow,
	__experimentalNumberControl as NumberControl
} from '@wordpress/components';

const ControlPanel = ({options}) => {

	const {
		attributes: {
			showLabels,
			showPlaceholders,
			textColor,
			textFontWeight,
			inputBorderRadius,
			buttonBgColor,
			buttonTextColor
		}, setAttributes
	} = options;

	return (
		<InspectorControls>
			<Panel>
				<PanelBody title="Label Settings" initialOpen={true}>
					<PanelRow>
						<ToggleControl
							label="Show Labels"
							help={
								showLabels
									? 'Show'
									: 'Hide'
							}
							checked={showLabels}
							onChange={(val) => setAttributes({showLabels: val})}
						/>
					</PanelRow>
					<PanelRow>
						<SelectControl labelPosition={'side'}
									   label="Font Weight & Font Color"
									   value={textFontWeight}
									   options={[
										   {label: 'Normal', value: 'normal'},
										   {label: 'Bold', value: 'bold'},
										   {label: 'Light', value: 'lighter'},
									   ]}
									   onChange={(val) => setAttributes({textFontWeight: val})}
						/>
					</PanelRow>
					<PanelRow>
						<ColorPicker
							color={textColor}
							onChange={(val) => setAttributes({textColor: val})}
							enableAlpha
							defaultValue="#000"
						/>
					</PanelRow>
					<PanelRow>

						<RangeControl
							label="Input Border Radius"
							value={inputBorderRadius}
							onChange={(val) => setAttributes({inputBorderRadius: val})}
							min={0}
							max={25}
						/>
					</PanelRow>
				</PanelBody>
			</Panel>


		</InspectorControls>
	)
}

export default ControlPanel;
