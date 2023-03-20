import {useBlockProps, InspectorControls, useInnerBlocksProps} from '@wordpress/block-editor';
import {
	ToggleControl,
	PanelBody,
	PanelRow,
	__experimentalNumberControl as NumberControl
} from '@wordpress/components';
import './editor.scss';

export default function Edit(props) {

	const blockProps = useBlockProps();

	const innerBlocksProps = useInnerBlocksProps(
		blockProps,
		{
			allowedBlocks: ['gb-for-slick-slider/slick-slider-item'],
			orientation: "horizontal"
		}
	);

	const {
		attributes: {
			slidesToShow,
			slidesToScroll,
			speed,
			dots,
			arrows,
			infinite,
			autoplay,
			autoplaySpeed,
			centerMode,
			adaptiveHeight,
			fade,
		}, setAttributes
	} = props;


	return (
		<>
			<section className='gb-for-slick-slider' {...innerBlocksProps} />
			<InspectorControls>
				<PanelBody>
					<PanelRow>
						<NumberControl
							label="Slides to show "
							value={slidesToShow}
							onChange={(val) => setAttributes({slidesToShow: Number(val)})}
						/>
					</PanelRow>
					{slidesToShow <= 1 &&
						<PanelRow>
							<ToggleControl
								label="Fade"
								help={
									fade
										? 'Yes'
										: 'No'
								}
								checked={fade}
								onChange={(val) => setAttributes({fade: val})}
							/>
						</PanelRow>
					}
					{slidesToShow > 1 &&
						<PanelRow>
							<ToggleControl
								label="Center Mode"
								help={
									centerMode
										? 'Yes'
										: 'No'
								}
								checked={centerMode}
								onChange={(val) => setAttributes({centerMode: val})}
							/>
						</PanelRow>
					}
					{centerMode && slidesToShow > 1 &&
						<PanelRow>
							<ToggleControl
								label="Infinite loop"
								help={
									infinite
										? 'Yes'
										: 'No'
								}
								checked={infinite}
								onChange={(val) => setAttributes({infinite: val})}
							/>
						</PanelRow>
					}
					<PanelRow>
						<NumberControl
							label="Slides to scroll "
							value={slidesToScroll}
							onChange={(val) => setAttributes({slidesToScroll: Number(val)})}
						/>
					</PanelRow>
					<PanelRow>
						<NumberControl
							label="Slide speed"
							value={speed}
							onChange={(val) => setAttributes({speed: val})}
						/>
					</PanelRow>
					<PanelRow>
						<ToggleControl
							label="Show Dots"
							help={
								dots
									? 'Show dots'
									: 'Hide dots'
							}
							checked={dots}
							onChange={(val) => setAttributes({dots: val})}
						/>
					</PanelRow>
					<PanelRow>
						<ToggleControl
							label="Show Arrows"
							help={
								arrows
									? 'Show arrows'
									: 'Hide arrows'
							}
							checked={arrows}
							onChange={(val) => setAttributes({arrows: val})}
						/>
					</PanelRow>
					<PanelRow>
						<ToggleControl
							label="Autoplay"
							help={
								autoplay
									? 'Yes'
									: 'No'
							}
							checked={autoplay}
							onChange={(val) => setAttributes({autoplay: val})}
						/>
					</PanelRow>
					{autoplay &&
						<PanelRow>
							<NumberControl
								label="Autoplay speed "
								value={autoplaySpeed}
								onChange={(val) => setAttributes({autoplaySpeed: val})}
							/>
						</PanelRow>
					}
					<PanelRow>
						<ToggleControl
							label="Adaptive Height"
							help={
								adaptiveHeight
									? 'Yes'
									: 'No'
							}
							checked={adaptiveHeight}
							onChange={(val) => setAttributes({adaptiveHeight: val})}
						/>
					</PanelRow>
				</PanelBody>
			</InspectorControls>
		</>
	)
		;
}

