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
export default function Edit({ attributes, setAttributes }) {
	return (
		<div {...useBlockProps()}>
			<input
				type="text" 
				id="business-block-name" 
				value={attributes.businessName} 
				onChange={(event) => setAttributes({ businessName: event.target.value })} 
				className='business-block-name'
				placeholder={__('Business Name', 'business-block')}
				/>
			<br/>
			<textarea
				id="business-block-description"
				value={attributes.businessDescription}
				onChange={(event) => setAttributes({ businessDescription: event.target.value })}
				cols={80}
				rows={5}
			>
			</textarea>
			<br/>
			<label htmlFor="business-block-address">{__('Address', 'business-block')}</label>
			<br/>
			<textarea
				id="business-block-address"
				value={attributes.businessAddress}
				onChange={(event) => setAttributes({ businessAddress: event.target.value })}
				className='business-block-address'
				cols={80}
				rows={5}
			>
			</textarea>
			<br/>
			<label htmlFor="business-block-phone">{__('Phone Numbers', 'business-block')}</label>
			<input
				type="text"
				id="business-block-phone"
				value={attributes.businessPhone}
				onChange={(event) => setAttributes({ businessPhone: event.target.value })}
				className='business-block-phone'
			/>
			<br/>
			<label htmlFor="business-block-email">{__('Email Address', 'business-block')}</label>
			<input
				type="text"
				id="business-block-email"
				value={attributes.businessEmail}
				onChange={(event) => setAttributes({ businessEmail: event.target.value })}
				className='business-block-email'
			/>
			<br/>
			<label htmlFor="business-block-website">{__('Website', 'business-block')}</label>
			<input
				type="text"
				id="business-block-website"
				value={attributes.businessWebsite}
				onChange={(event) => setAttributes({ businessWebsite: event.target.value })}
				className='business-block-website'
			/>
			<br/>
			<label htmlFor="business-block-hours">{__('Business Hours', 'business-block')}</label>
			<input
				type="text"
				id="business-block-hours"
				value={attributes.businessHours}
				onChange={(event) => setAttributes({ businessHours: event.target.value })}
				className='business-block-hours'
			/>
			<br/>
		</div>
	);
}
