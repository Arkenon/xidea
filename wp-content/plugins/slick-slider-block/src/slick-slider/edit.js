import {useBlockProps,InspectorControls, useInnerBlocksProps} from '@wordpress/block-editor';
import {
	ToggleControl,
	PanelBody,
	PanelRow,
	TextControl,
	__experimentalNumberControl as NumberControl
} from '@wordpress/components';
import './editor.scss';

export default function Edit(props) {

	const blockProps = useBlockProps();

	const innerBlocksProps = useInnerBlocksProps(
		blockProps,
		{ allowedBlocks: [ 'slick-slider-block/slick-slider-item' ] }
	);

	const {attributes: {sliderId, slidesToShow, slidesToScroll, dots, arrows}, setAttributes} = props;

	const options = {
		dots: true,
		infinite: true,
		speed: 500,
		slidesToShow: 2,
		slidesToScroll: 1
	};

	// {`"dots":${dots},"arrows":true,"slidesToShow": 2, "slidesToScroll": 1`}

	return (
		<>
			<section className='slick-slider-block'
					 data-slick='{"dots":true,"arrows":true,"slidesToShow": 2, "slidesToScroll": 1}' {...innerBlocksProps} />
			<InspectorControls>
				<PanelBody>
					<PanelRow>
						<TextControl
							label="Slider Id (exp: 'my-slider-1')"
							value={sliderId}
							onChange={(newSliderId) => setAttributes({sliderId: newSliderId})}
						/>
					</PanelRow>
					<PanelRow>
						<ToggleControl
							label="Show Dots"
							help={
								dots
									? 'Shot dots'
									: 'Hide dots'
							}
							checked={ dots }
							onChange={(newDots) => setAttributes({dots: newDots})}
						/>
					</PanelRow>
					<PanelRow>
						<ToggleControl
							label="Show Arrows"
							help={
								arrows
									? 'Shot arrows'
									: 'Hide arrows'
							}
							checked={ dots }
							onChange={(newArrows) => setAttributes({arrows: newArrows})}
						/>
					</PanelRow>
					<PanelRow>
						<NumberControl
							label="Slides to show "
							value={slidesToShow}
							onChange={(newSlidesToShow) => setAttributes({slidesToShow: newSlidesToShow})}
						/>
					</PanelRow>
					<PanelRow>
						<NumberControl
							label="Slides to scroll "
							value={slidesToScroll}
							onChange={(newSlidesToScroll) => setAttributes({slidesToScroll: newSlidesToScroll})}
						/>
					</PanelRow>
				</PanelBody>
			</InspectorControls>
		</>
	);
}

