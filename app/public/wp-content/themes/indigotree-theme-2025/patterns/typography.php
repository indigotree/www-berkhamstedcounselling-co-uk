<?php
/**
 * Title: Typography
 * Slug: indigotree/typography
 * Categories: indigotree
 * Description: A showcase of theme styles applied to typography elements.
 * Keywords: indigo, tree, typography, design, style, theme, block, pattern
 * Post Types: page
 */

?>
<!-- wp:heading {"textAlign":"center","level":1,"align":"full","style":{"spacing":{"margin":{"top":"var:preset|spacing|base"}}}} -->
<h1 class="wp-block-heading alignfull has-text-align-center" style="margin-top:var(--wp--preset--spacing--base)">Typography</h1>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"center","align":"full"} -->
<h2 class="wp-block-heading alignfull has-text-align-center">Accessible Colour Combinations</h2>
<!-- /wp:heading -->

<!-- wp:group {"metadata":{"name":"Accessible Colour Combinations"},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:group {"layout":{"type":"grid","minimumColumnWidth":"20rem","columnCount":null}} -->
<div class="wp-block-group"><!-- wp:paragraph {"backgroundColor":"black","textColor":"white"} -->
<p class="has-white-color has-black-background-color has-text-color has-background">White text on a black background.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"border":{"width":"2px"},"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"backgroundColor":"white","textColor":"black","borderColor":"black"} -->
<p class="has-border-color has-black-border-color has-black-color has-white-background-color has-text-color has-background has-link-color" style="border-width:2px">Black text on a white background.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"backgroundColor":"black","textColor":"light-grey"} -->
<p class="has-light-grey-color has-black-background-color has-text-color has-background">Light grey text on a black background.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"backgroundColor":"light-grey","textColor":"black"} -->
<p class="has-black-color has-light-grey-background-color has-text-color has-background has-link-color">Black text on a light grey background.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"border":{"width":"1px"},"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"backgroundColor":"primary","textColor":"white","borderColor":"primary"} -->
<p class="has-border-color has-primary-border-color has-white-color has-primary-background-color has-text-color has-background has-link-color" style="border-width:1px">White text on a primary background.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"border":{"width":"2px"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"backgroundColor":"white","textColor":"primary","borderColor":"primary"} -->
<p class="has-border-color has-primary-border-color has-primary-color has-white-background-color has-text-color has-background has-link-color" style="border-width:2px">Primary text on a white background.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"border":{"width":"2px"},"elements":{"link":{"color":{"text":"var:preset|color|error"}}}},"backgroundColor":"white","textColor":"error","borderColor":"error"} -->
<p class="has-border-color has-error-border-color has-error-color has-white-background-color has-text-color has-background has-link-color" style="border-width:2px">Error text on a white background.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"border":{"width":"2px"},"elements":{"link":{"color":{"text":"var:preset|color|success"}}}},"backgroundColor":"white","textColor":"success","borderColor":"success"} -->
<p class="has-border-color has-success-border-color has-success-color has-white-background-color has-text-color has-background has-link-color" style="border-width:2px">Success text on a white background.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"border":{"width":"2px"},"elements":{"link":{"color":{"text":"var:preset|color|info"}}}},"backgroundColor":"white","textColor":"info","borderColor":"info"} -->
<p class="has-border-color has-info-border-color has-info-color has-white-background-color has-text-color has-background has-link-color" style="border-width:2px">Info text on a white background.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"center","align":"full"} -->
<h2 class="wp-block-heading alignfull has-text-align-center">Heading &amp; Paragraph</h2>
<!-- /wp:heading -->

<!-- wp:group {"metadata":{"name":"Heading + Paragraph"},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">H1 Heading</h1>
<!-- /wp:heading -->

<!-- wp:heading -->
<h2 class="wp-block-heading">H2 Heading</h2>
<!-- /wp:heading -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">H3 Heading</h3>
<!-- /wp:heading -->

<!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading">H4 Heading</h4>
<!-- /wp:heading -->

<!-- wp:heading {"level":5} -->
<h5 class="wp-block-heading">H5 Heading</h5>
<!-- /wp:heading -->

<!-- wp:heading {"level":6} -->
<h6 class="wp-block-heading">H6 Heading</h6>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>This is a paragraph of body text. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p><strong>This is bold text.</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><em>This is italic text.</em></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>This text has a link to <a href="https://google.co.uk/" target="_blank" rel="noreferrer noopener sponsored nofollow">Google</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><abbr title="ABBR">This text is used as an abbreviation.</abbr></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>This is highlighted text with <strong><mark style="background-color:#f5f5f5" class="has-inline-color">background</mark></strong> colour.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>This is highlighted text with <mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-dark-error"><strong>text</strong></mark> colour.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>This is highlighted text with <strong><mark style="background-color:#f5f5f5" class="has-inline-color has-error-color">background and text</mark></strong> colour.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><code>This is inline &lt;code /&gt;.</code></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><kbd>This is keyboard input text.</kbd></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><s>This is strikethrough text.</s></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>This is standard text. <sub>This is subscript text.</sub></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>This is standard text. <sup>This is superscript text.</sup></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>This text has a footnote.<sup data-fn="1558bf0d-5e86-4f41-90d0-d0c569665f53" class="fn"><a href="#1558bf0d-5e86-4f41-90d0-d0c569665f53" id="1558bf0d-5e86-4f41-90d0-d0c569665f53-link">1</a></sup></p>
<!-- /wp:paragraph -->

<!-- wp:footnotes /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"center","align":"full"} -->
<h2 class="wp-block-heading alignfull has-text-align-center">List</h2>
<!-- /wp:heading -->

<!-- wp:group {"metadata":{"name":"List"},"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:list -->
<ul class="wp-block-list"><!-- wp:list-item -->
<li>This is an unordered list item.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>This is an unordered list item.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>This is an unordered list item.</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:list {"ordered":true} -->
<ol class="wp-block-list"><!-- wp:list-item -->
<li>This is an ordered list item.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>This is an ordered list item.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>This is an ordered list item.</li>
<!-- /wp:list-item --></ol>
<!-- /wp:list --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"center","align":"full"} -->
<h2 class="wp-block-heading alignfull has-text-align-center">Misc. Text Blocks</h2>
<!-- /wp:heading -->

<!-- wp:group {"metadata":{"name":"Misc. Text Blocks"},"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull"><!-- wp:preformatted -->
<pre class="wp-block-preformatted">This is a Preformatted block.</pre>
<!-- /wp:preformatted -->

<!-- wp:code -->
<pre class="wp-block-code"><code>This is a &lt;code&gt;Code&lt;/code&gt; block.</code></pre>
<!-- /wp:code -->

<!-- wp:verse -->
<pre class="wp-block-verse">This is a Verse block.</pre>
<!-- /wp:verse --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"center","align":"full"} -->
<h2 class="wp-block-heading alignfull has-text-align-center">Separator</h2>
<!-- /wp:heading -->

<!-- wp:group {"metadata":{"name":"Separator"},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:separator -->
<hr class="wp-block-separator has-alpha-channel-opacity"/>
<!-- /wp:separator --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"center","align":"full"} -->
<h2 class="wp-block-heading alignfull has-text-align-center">Breadcrumbs - Yoast SEO</h2>
<!-- /wp:heading -->

<!-- wp:group {"metadata":{"name":"Breadcrumbs - Yoast SEO"},"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull"><!-- wp:yoast-seo/breadcrumbs /--></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"center","align":"full"} -->
<h2 class="wp-block-heading alignfull has-text-align-center">Buttons</h2>
<!-- /wp:heading -->

<!-- wp:group {"metadata":{"name":"Buttons"},"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-fill"} -->
<div class="wp-block-button is-style-fill"><a class="wp-block-button__link wp-element-button" href="https://google.co.uk/">Normal Button</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="/">Outline</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"center","align":"full"} -->
<h2 class="wp-block-heading alignfull has-text-align-center">Social Icons</h2>
<!-- /wp:heading -->

<!-- wp:social-links {"layout":{"type":"flex","justifyContent":"center"}} -->
<ul class="wp-block-social-links"><!-- wp:social-link {"url":"https://www.linkedin.com","service":"linkedin","label":"This company on LinkedIn","rel":""} /-->

<!-- wp:social-link {"url":"https://www.facebook.com","service":"facebook","label":"This company on Facebook","rel":""} /-->

<!-- wp:social-link {"url":"https://www.twitter.com","service":"twitter","label":"This company on Twitter","rel":""} /-->

<!-- wp:social-link {"url":"https://instagram.com/","service":"instagram","label":"This company on Instagram"} /-->

<!-- wp:social-link {"url":"https://youtube.com/","service":"youtube","label":"This company on YouTube"} /--></ul>
<!-- /wp:social-links -->

<!-- wp:heading {"textAlign":"center","align":"full"} -->
<h2 class="wp-block-heading alignfull has-text-align-center">Testimonial - Quote &amp; Pullquote</h2>
<!-- /wp:heading -->

<!-- wp:group {"metadata":{"name":"Testimonial - Quote \u0026 Pullquote"},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:quote -->
<blockquote class="wp-block-quote"><!-- wp:paragraph -->
<p>This is an Quote block, used for a testimonial.</p>
<!-- /wp:paragraph --><cite>A citation</cite></blockquote>
<!-- /wp:quote --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:pullquote -->
<figure class="wp-block-pullquote"><blockquote><p>This is a Pullquote block, used for a testimonial.</p><cite>A citation</cite></blockquote></figure>
<!-- /wp:pullquote --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"center","align":"full"} -->
<h2 class="wp-block-heading alignfull has-text-align-center">Table</h2>
<!-- /wp:heading -->

<!-- wp:group {"metadata":{"name":"Table"},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:table -->
<figure class="wp-block-table"><table class="has-fixed-layout"><thead><tr><th>A1</th><th>With a header section.</th><th>C1</th><th>D1</th></tr></thead><tbody><tr><td>This is a Table block.</td><td>With fixed width cells.</td><td>C2</td><td>(R2)D2</td></tr><tr><td>A3</td><td>B3</td><td>C3(-PO)</td><td>D3</td></tr><tr><td>A4</td><td>B4</td><td>C4</td><td>D4</td></tr></tbody><tfoot><tr><td>A5</td><td>With a footer section.</td><td>C5</td><td>D5</td></tr></tfoot></table><figcaption class="wp-element-caption">With a table caption.</figcaption></figure>
<!-- /wp:table --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"center","align":"full"} -->
<h2 class="wp-block-heading alignfull has-text-align-center">Search Form - Search WP</h2>
<!-- /wp:heading -->

<!-- wp:group {"metadata":{"name":"Search Form - Search WP"},"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull"><!-- wp:searchwp/search-form {"id":1} /--></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"center","align":"full"} -->
<h2 class="wp-block-heading alignfull has-text-align-center">Other Forms - Gravity Forms</h2>
<!-- /wp:heading -->

<!-- wp:group {"metadata":{"name":"Other Forms - Gravity Forms"},"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull"><!-- wp:gravityforms/form {"formId":"2","inputSize":"lg","inputBorderColor":"#000000","inputBackgroundColor":"#FFFFFF","inputColor":"#000000","inputPrimaryColor":"#201651","inputImageChoiceAppearance":"no-card","inputImageChoiceStyle":"circle","inputImageChoiceSize":"sm","labelFontSize":"18","labelColor":"#201651","descriptionFontSize":"16","descriptionColor":"#000000","buttonPrimaryBackgroundColor":"#201651","buttonPrimaryColor":"#FFFFFF"} /--></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"center","align":"full"} -->
<h2 class="wp-block-heading alignfull has-text-align-center">Accordion - WP default</h2>
<!-- /wp:heading -->

<!-- wp:accordion -->
<div role="group" class="wp-block-accordion"><!-- wp:accordion-item -->
<div class="wp-block-accordion-item"><!-- wp:accordion-heading -->
<h3 class="wp-block-accordion-heading"><button class="wp-block-accordion-heading__toggle"><span class="wp-block-accordion-heading__toggle-title">My accordion title</span><span class="wp-block-accordion-heading__toggle-icon" aria-hidden="true">+</span></button></h3>
<!-- /wp:accordion-heading -->

<!-- wp:accordion-panel -->
<div role="region" class="wp-block-accordion-panel"><!-- wp:paragraph -->
<p>My accordion content. Lorem ipsum dolor</p>
<!-- /wp:paragraph --></div>
<!-- /wp:accordion-panel --></div>
<!-- /wp:accordion-item --></div>
<!-- /wp:accordion -->

<!-- wp:accordion -->
<div role="group" class="wp-block-accordion"><!-- wp:accordion-item -->
<div class="wp-block-accordion-item"><!-- wp:accordion-heading -->
<h3 class="wp-block-accordion-heading"><button class="wp-block-accordion-heading__toggle"><span class="wp-block-accordion-heading__toggle-title">My accordion title</span><span class="wp-block-accordion-heading__toggle-icon" aria-hidden="true">+</span></button></h3>
<!-- /wp:accordion-heading -->

<!-- wp:accordion-panel -->
<div role="region" class="wp-block-accordion-panel"><!-- wp:paragraph -->
<p>My accordion content. Lorem ipsum dolor</p>
<!-- /wp:paragraph --></div>
<!-- /wp:accordion-panel --></div>
<!-- /wp:accordion-item --></div>
<!-- /wp:accordion -->

<!-- wp:query {"queryId":0,"query":{"perPage":2,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null,"parents":[],"format":[]}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:post-featured-image /-->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small"}}},"layout":{"type":"constrained","justifyContent":"left"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--x-small)"><!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}}} /-->

<!-- wp:post-title /-->

<!-- wp:read-more /--></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-pagination -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query -->