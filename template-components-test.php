<?php
/**
 * This file contains a sample of web design patterns styled with the Bourbon, Neat, Bitters and Refills front-end framework.
 *
 * @author Moortor Design Ltd. - Dave Dean
 * @package Moortor Design Starter Theme
 * @subpackage Customizations
 */

/*
Template Name: Components Test
*/



remove_action('genesis_loop', 'genesis_do_loop');
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

// Add our custom loop
add_action('genesis_loop', 's_components_test_loop');
function s_components_test_loop() {
    ?>

    <p>This is a sample of re-usable design patterns.</p>

    <hr>

    <h1>Scroll on page</h1>

    <ul class="page-links">
        <li><a class="scroll-on-page-link" href="#flex-boxes-section">Flex Boxes</a></li>
        <li><a class="scroll-on-page-link" href="#hero-section">Hero Section</a></li>
        <li><a class="scroll-on-page-link" href="#parallax-section">Parallax Section</a></li>
        <li><a class="scroll-on-page-link" href="#minimal-tabs-section">Minimal Tabs</a></li>
        <li><a class="scroll-on-page-link" href="#normal-tabs-section">Normal Tabs</a></li>
        <li><a class="scroll-on-page-link" href="#vertical-tabs-section">Vertical Tabs</a></li>
        <li><a class="scroll-on-page-link" href="#accordion-section">Accordion</a></li>
        <li><a class="scroll-on-page-link" href="#expanders-section">Expanders</a></li>
        <li><a class="scroll-on-page-link" href="#faqs-section">FAQs</a></li>
        <li><a class="scroll-on-page-link" href="#pricing-tables-section">Pricing Tables</a></li>
        <li><a class="scroll-on-page-link" href="#side-images-section">Side Images</a></li>
        <li><a class="scroll-on-page-link" href="#icon-bullets-section">Icon Bullets</a></li>
        <li><a class="scroll-on-page-link" href="#cards-section">Cards</a></li>
        <li><a class="scroll-on-page-link" href="#badges-section">Badges</a></li>
        <li><a class="scroll-on-page-link" href="#textures-section">Textures</a></li>
        <li><a class="scroll-on-page-link" href="#modals-section">Modals</a></li>
        <li><a class="scroll-on-page-link" href="#grid-items">Grid Items</a></li>
        <li><a class="scroll-on-page-link" href="#ribbon-box">Ribbon Box</a></li>
        <li><a href="#video-wrapper" class="scroll-on-page-link">Video Wrapper</a></li>
        <li><a href="#google-map" class="scroll-on-page-link">Google Map</a></li>
        <li><a href="#slick-slider" class="scroll-on-page-link">Slick Slider</a></li>
        <li><a href="#sliding-panel" class="scroll-on-page-link">Sliding Panel</a></li>
        <li><a href="#tooltip" class="scroll-on-page-link">Tooltip</a></li>

    </ul>

    <hr>

    <h1 id="flex-boxes-section">Flex Boxes</h1>

    <div class="flex-boxes">
        <a href="javascript:void(0)" class="flex-box flex-box-big">
            <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/placeholder_logo_2_dark.png" alt="">
            <h1 class="flex-title">A Wide Flex Box Item</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad nostrum, libero! Laborum distinctio necessitatibus voluptates eaque officiis, unde illo, earum voluptatum rerum, reiciendis ipsa ex dolorem a dicta, maxime aliquam.</p>
        </a>
        <a href="javascript:void(0)" class="flex-box">
            <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/placeholder_logo_1_dark.png" alt="">
            <h1 class="flex-title">Flex Box Item</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum molestiae fugiat tenetur fugit atque dignissimos, fugiat natus vitae.</p>
        </a>
        <a href="javascript:void(0)" class="flex-box">
            <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/placeholder_logo_3_dark.png" alt="">
            <h1 class="flex-title">A Flex Box Item</h1>
            <p>Lorem adipisicing elit. Voluptas consectetur tempora quis nam, officia tenetur blanditiis in illo dolor?</p>
        </a>
        <a href="javascript:void(0)" class="flex-box flex-box-big">
            <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/placeholder_logo_2_dark.png" alt="">
            <h1 class="flex-title">Another Wide Item</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quis ipsum, officia, aperiam tenetur dolor molestiae voluptate perferendis dolorem vel ex, unde fugit blanditiis sapiente.</p>
        </a>
        <a href="javascript:void(0)" class="flex-box">
            <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/placeholder_logo_2_dark.png" alt="">
            <h1 class="flex-title">Flex Box Item</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo obcaecati in provident illo.</p>
        </a>
        <a href="javascript:void(0)" class="flex-box">
            <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/placeholder_logo_3_dark.png" alt="">
            <h1 class="flex-title">Last Flex Box Item</h1>
            <p>Lorem ipsum dolor sit amet, elit. Rem, illum.</p>
        </a>
    </div>

    <hr>

    <h1 id="hero-section">Hero Section</h1>

    <section class="hero">
        <div class="hero-inner">
            <a href="" class="hero-logo"><img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/placeholder_logo_1.png" alt="Logo Image"></a>
            <div class="hero-copy">
                <h1>Short description of Product</h1>
                <p>A few reasons why this product is worth using, who it's for and why they need it.</p>  
            </div>
            <button>Learn More</button>
        </div>
    </section>

    <hr>

    <h1 id="parallax-section">Parallax Section</h1>

    <section id="js-parallax-window" class="parallax-window">
        <div class="parallax-static-content">
            <h3>Stop worrying about hosting, search engines, landing pages, contact forms, eCommerce.</h3>

            <p>We remove the headache of building and maintaining your website and help you concentrate on using it to grow your business. Focus on what's important.</p>

            <p><strong>Generate leads. Make sales.</strong></p>

            <a class="button" href="javascript:;">Get started</a>
        </div>
        <div id="js-parallax-background" class="parallax-background"></div>
    </section>

    <hr>

    <h1 id="minimal-tabs-section">Minimal Styling Tabbed Content</h1>

<ul class="accordion-tabs-minimal">
  <li class="tab-header-and-content">
    <a href="#" class="tab-link is-active">Tab Item</a>
    <div class="tab-content">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt pellentesque lorem, id suscipit dolor rutrum id. Morbi facilisis porta volutpat. Fusce adipiscing, mauris quis congue tincidunt, sapien purus suscipit odio, quis dictum odio tortor in sem. Ut sit amet libero nec orci mattis fringilla. Praesent eu ipsum in sapien tincidunt molestie sed ut magna. Nam accumsan dui at orci rhoncus pharetra tincidunt elit ullamcorper. Sed ac mauris ipsum. Nullam imperdiet sapien id purus pretium id aliquam mi ullamcorper.</p>
    </div>
  </li>
  <li class="tab-header-and-content">
    <a href="#" class="tab-link">Another Tab</a>
    <div class="tab-content">
      <p>Ut laoreet augue et neque pretium non sagittis nibh pulvinar. Etiam ornare tincidunt orci quis ultrices. Pellentesque ac sapien ac purus gravida ullamcorper. Duis rhoncus sodales lacus, vitae adipiscing tellus pharetra sed. Praesent bibendum lacus quis metus condimentum ac accumsan orci vulputate. Aenean fringilla massa vitae metus facilisis congue. Morbi placerat eros ac sapien semper pulvinar. Vestibulum facilisis, ligula a molestie venenatis, metus justo ullamcorper ipsum, congue aliquet dolor tortor eu neque. Sed imperdiet, nibh ut vestibulum tempor, nibh dui volutpat lacus, vel gravida magna justo sit amet quam. Quisque tincidunt ligula at nisl imperdiet sagittis. Morbi rutrum tempor arcu, non ultrices sem semper a. Aliquam quis sem mi.</p>
    </div>
  </li>
  <li class="tab-header-and-content">
    <a href="#" class="tab-link">Third</a>
    <div class="tab-content">
      <p>Donec mattis mauris gravida metus laoreet non rutrum sem viverra. Aenean nibh libero, viverra vel vestibulum in, porttitor ut sapien. Phasellus tempor lorem id justo ornare tincidunt. Nulla faucibus, purus eu placerat fermentum, velit mi iaculis nunc, bibendum tincidunt ipsum justo eu mauris. Nulla facilisi. Vestibulum vel lectus ac purus tempus suscipit nec sit amet eros. Nullam fringilla, enim eu lobortis dapibus, quam magna tincidunt nibh, sit amet imperdiet dolor justo congue turpis.</p>    
    </div>
  </li>
  <li class="tab-header-and-content">
    <a href="#" class="tab-link">Last Item</a>
    <div class="tab-content">
      <p>Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus dui urna.</p>
    </div>
  </li>
</ul>
    <hr>

    <h1 id="normal-tabs-section">Tabbed Content</h1>

    <ul class="accordion-tabs">
        <li class="tab-header-and-content">
            <a href="javascript:void(0)" class="is-active tab-link">Tab Item</a>
            <div class="tab-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt pellentesque lorem, id suscipit dolor rutrum id. Morbi facilisis porta volutpat. Fusce adipiscing, mauris quis congue tincidunt, sapien purus suscipit odio, quis dictum odio tortor in sem. Ut sit amet libero nec orci mattis fringilla. Praesent eu ipsum in sapien tincidunt molestie sed ut magna. Nam accumsan dui at orci rhoncus pharetra tincidunt elit ullamcorper. Sed ac mauris ipsum. Nullam imperdiet sapien id purus pretium id aliquam mi ullamcorper.</p>
            </div>
        </li>
        <li class="tab-header-and-content">
            <a href="javascript:void(0)" class="tab-link">Another Tab</a>
            <div class="tab-content">
                <p>Ut laoreet augue et neque pretium non sagittis nibh pulvinar. Etiam ornare tincidunt orci quis ultrices. Pellentesque ac sapien ac purus gravida ullamcorper. Duis rhoncus sodales lacus, vitae adipiscing tellus pharetra sed. Praesent bibendum lacus quis metus condimentum ac accumsan orci vulputate. Aenean fringilla massa vitae metus facilisis congue. Morbi placerat eros ac sapien semper pulvinar. Vestibulum facilisis, ligula a molestie venenatis, metus justo ullamcorper ipsum, congue aliquet dolor tortor eu neque. Sed imperdiet, nibh ut vestibulum tempor, nibh dui volutpat lacus, vel gravida magna justo sit amet quam. Quisque tincidunt ligula at nisl imperdiet sagittis. Morbi rutrum tempor arcu, non ultrices sem semper a. Aliquam quis sem mi.</p>
            </div>
        </li>
        <li class="tab-header-and-content">
            <a href="javascript:void(0)" class="tab-link">Third</a>
            <div class="tab-content">
                <p>Donec mattis mauris gravida metus laoreet non rutrum sem viverra. Aenean nibh libero, viverra vel vestibulum in, porttitor ut sapien. Phasellus tempor lorem id justo ornare tincidunt. Nulla faucibus, purus eu placerat fermentum, velit mi iaculis nunc, bibendum tincidunt ipsum justo eu mauris. Nulla facilisi. Vestibulum vel lectus ac purus tempus suscipit nec sit amet eros. Nullam fringilla, enim eu lobortis dapibus, quam magna tincidunt nibh, sit amet imperdiet dolor justo congue turpis.</p>    
            </div>
        </li>
        <li class="tab-header-and-content">
            <a href="javascript:void(0)" class="tab-link">Last Item</a>
            <div class="tab-content">
                <p>Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus dui urna.</p>
            </div>
        </li>
    </ul>

    <hr>

    <h1 id="vertical-tabs-section">Vertical Tabs</h1>

    <div class="vertical-tabs-container">
        <div class="vertical-tabs">
            <a href="javascript:void(0)" class="js-vertical-tab vertical-tab is-active" rel="tab1">Item 1</a>
            <a href="javascript:void(0)" class="js-vertical-tab vertical-tab" rel="tab2">Item 2</a>
            <a href="javascript:void(0)" class="js-vertical-tab vertical-tab" rel="tab3">Item 3</a>
            <a href="javascript:void(0)" class="js-vertical-tab vertical-tab" rel="tab4">Item 4</a>
        </div>

        <div class="vertical-tab-content-container">
            <a href="" class="js-vertical-tab-accordion-heading vertical-tab-accordion-heading is-active" rel="tab1">Item 1</a>
            <div id="tab1" class="js-vertical-tab-content vertical-tab-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt pellentesque lorem, id suscipit dolor rutrum id. Morbi facilisis porta volutpat. Fusce adipiscing, mauris quis congue tincidunt, sapien purus suscipit odio, quis dictum odio tortor in sem. Ut sit amet libero nec orci mattis fringilla. Praesent eu ipsum in sapien tincidunt molestie sed ut magna. Nam accumsan dui at orci rhoncus pharetra tincidunt elit ullamcorper. Sed ac mauris ipsum. Nullam imperdiet sapien id purus pretium id aliquam mi ullamcorper.</p>
            </div>

            <a href="" class="js-vertical-tab-accordion-heading vertical-tab-accordion-heading" rel="tab2">Item 2</a>
            <div id="tab2" class="js-vertical-tab-content vertical-tab-content">
                <p>Ut laoreet augue et neque pretium non sagittis nibh pulvinar. Etiam ornare tincidunt orci quis ultrices. Pellentesque ac sapien ac purus gravida ullamcorper. Duis rhoncus sodales lacus, vitae adipiscing tellus pharetra sed. Praesent bibendum.</p>
            </div>

            <a href="" class="js-vertical-tab-accordion-heading vertical-tab-accordion-heading" rel="tab3">Item 3</a>
            <div id="tab3" class="js-vertical-tab-content vertical-tab-content">
                <p>Donec mattis mauris gravida metus laoreet non rutrum sem viverra. Aenean nibh libero, viverra vel vestibulum in, porttitor ut sapien. Phasellus tempor lorem id justo ornare tincidunt. Nulla faucibus, purus eu placerat fermentum, velit mi iaculis nunc, bibendum tincidunt ipsum justo eu mauris. Nulla facilisi. Vestibulum vel lectus ac purus tempus suscipit nec sit amet eros. Nullam fringilla, enim eu lobortis dapibus, quam magna tincidunt nibh, sit amet imperdiet dolor justo congue turpis.</p>
            </div>

            <a href="" class="js-vertical-tab-accordion-heading vertical-tab-accordion-heading" rel="tab4">Item 4</a>
            <div id="tab4" class="js-vertical-tab-content vertical-tab-content">
                <p>Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus dui urna, mollis vel suscipit in, pharetra at ligula. Pellentesque a est vel est fermentum pellentesque sed sit amet dolor. Nunc in dapibus nibh. Aliquam erat volutpat. Phasellus vel dui sed nibh iaculis convallis id sit amet urna. Proin nec tellus quis justo consequat accumsan. Vivamus turpis enim, auctor eget placerat eget, aliquam ut sapien.</p>
            </div>
        </div>
    </div>

    <hr>

<ul class="accordion">
  <li>
    <a href="javascript:void(0)" class="js-accordion-trigger">Accordion Item</a>
    <ul class="submenu">
      <li>
        <a href="javascript:void(0)">Sub Item 1</a>
      </li>
      <li>
        <a href="javascript:void(0)">Sub Item 2</a>
      </li>
    </ul>
  </li>
  <li>
    <a href="javascript:void(0)" class="js-accordion-trigger">Another Item</a>
    <ul class="submenu">
      <li>
        <a href="javascript:void(0)">Sub Item 1</a>
      </li>
      <li>
        <a href="javascript:void(0)">Sub Item 2</a>
      </li>
    </ul>
  </li>
</ul>

    <hr>

    <h1 id="expanders-section">FAQs</h1>

    <section class="expander">
        <a href="javascript:void(0)" id="js-expander-trigger" class="expander-trigger expander-hidden"><Strong>NOTICE:</Strong> The Moortor Pilot Programme</a>
        <div id="js-expander-content" class="expander-content">
            <p><strong>We're trying something new. We'd like you to join us.</strong></p>
            <p>Moortor Web represents a new way of delivering web services. It's a solution that includes web development, hosting and on-going maintenance for a fixed monthly fee. But unlike existing <abbr title="Do It Yourself">DIY</abbr> site-builders the service is backed up by a real web agency.</p>
            <p>Moortor Web is currently in its pilot programme. We are open for anyone to sign up but we're still testing the edges of the service. The prices we are currently offering are greatly reduced from the eventual cost of the service. <strong>In return for joining us at this early stage, anyone who signs up during the pilot programme will continue to receive the discounted prices for the lifetime of their account.</strong></p>
            <p><em>This includes access to any new features added to your chosen tier.</em></p>
            <p><a href="<?php echo get_permalink(66) ?>">Find out more here</a></p>
            <p><strong>We're looking forward to you joining us!</strong></p>
        </div>
    </section>

    <hr>

    <h1 id="faqs-section">FAQs</h1>

    <section class="faqs">
        <div class="wrap">

        <h2>Frequently Asked Questions</h2>

            <div class="faq">
                <div class="faq-image">
                    <img src="<?php echo bloginfo('stylesheet_directory') ?>/images/icons/i-100px.png" alt="">
                </div>
                <div class="faq-content">
                    <h1>How long will it take to build my website?</h1>
                    <p>Moor &amp; Tor and Alpine tier sites will take approximately 3 to 5 weeks to go live, Himalayan sites at least 8 weeks. It depends a bit on the scope of the project. We'll put together a firm schedule once you've submitted your <em><a href="javascript:;">Get Started</a></em> forms.</p>
                    <p class="faq-detail">Enter as much detail as you can to speed the process along</p>
                </div>
            </div>

            <div class="faq">
                <div class="faq-image">
                    <img src="<?php echo bloginfo('stylesheet_directory') ?>/images/icons/i-100px.png" alt="">
                </div>
                <div class="faq-content">
                    <h1>How quickly can you start?</h1>
                    <p>It depends how busy we are! However, we aim to start a site within 4 weeks of you submitting your <em>Get Started</em> form. So hurry up and <a href="javascript:;">do it now!</a></p>
                    <p class="faq-detail">We'll let you know straight away if we think the start might be delayed.</p>
                </div>
            </div>

            <div class="faq">
                <div class="faq-image">
                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() ) ?>/images/icons/i-100px.png" alt="">
                </div>
                <div class="faq-content">
                    <h1>What's the difference between a stock theme and a custom theme?</h1>
                    <p>Your theme determines the look and feel of your website. It's crucial to how your visitors perceive and interact with your site.</p>
                    <p>A stock theme is one from our carefully curated library of beautiful and functional themes. We alter it to suit your branding.</p>
                    <p>A custom theme is one that is designed from scratch to suit the aesthetics of your brand and the functionality of your site.</p>
                    <p class="faq-detail">Online theme library coming soon...</p>
                </div>
            </div>

        </div>
    </section>

    <hr>

    <h1 id="pricing-tables-section">Pricing Tables</h1>

    <div class="pricing-tables">

        <div class="pricing-table">
            <div class="table-header">
                <h3>Bottom Tier</h3>
            </div>
            <div class="table-copy">
                <h4 class="price">
                    <sup class="currency-symbol">&pound;</sup><span class="cost">199</span>
                    <span class="period">/ mth</span>
                </h4>
                <ul class="features">
                    <li>Fast hosting &amp; custom domain name</li>
                    <li>Stock theme with your branding</li>
                    <li>Home page, content pages, contact page &amp; blog functionality</li>
                    <li>Daily backups</li>
                    <li>WordPress, theme and plugin updates</li>
                    <li>Monthly security scans &amp; security guarantee</li>
                    <li>Up to 3 small jobs or 1 regular job per month</li>
                    <li>Online ticketing support</li>
                    <li>In-dash video training</li>
                    <li>Up to 20,000 visits per month</li>
                </ul>
                <p><a href="javascript:;" class="button">Get started</a></p>
            </div>
        </div>

        <div class="pricing-table">
            <div class="table-header">
                <h3>Middle Tier</h3>
            </div>
            <div class="table-copy">
                <h4 class="price">
                    <sup class="currency-symbol">&pound;</sup><span class="cost">299</span>
                    <span class="period">/ mth</span>
                </h4>
                <ul class="features">
                    <li>Fast hosting &amp; custom domain name</li>
                    <li><strong>Totally custom theme</strong></li>
                    <li>Home page, content pages, contact page, blog functionality &amp; <strong>landing pages</strong></li>
                    <li>Daily backups</li>
                    <li>WordPress, theme and plugin updates</li>
                    <li>Monthly security scans &amp; security guarantee</li>
                    <li><strong>Up to 5 small jobs or 2 regular jobs per month</strong></li>
                    <li>Online ticketing support</li>
                    <li>In-dash video training</li>
                    <li><strong>Up to 50,000 visits per month</strong></li>
                </ul>
                <p><a href="javascript:;" class="button">Get started</a></p>
            </div>
        </div>

        <div class="pricing-table">
            <div class="table-header">
                <h3>Top Tier</h3>
            </div>
            <div class="table-copy">
                <h4 class="price">
                    <sup class="currency-symbol">&pound;</sup><span class="cost">499</span>
                    <span class="period">/ mth</span>
                </h4>
                <ul class="features">
                    <li>Fast hosting &amp; custom domain name</li>
                    <li><strong>Totally custom theme</strong></li>
                    <li>Home page, content pages, contact page, blog functionality &amp; <strong>landing pages</strong></li>
                    <li><strong>eCommerce</strong></li>
                    <li>Daily backups</li>
                    <li>WordPress, theme and plugin updates</li>
                    <li>Monthly security scans &amp; security guarantee</li>
                    <li><strong>Up to 7 small jobs or 3 regular jobs per month</strong></li>
                    <li><strong>Online ticketing &amp; phone support</strong></li>
                    <li>In-dash video training</li>
                    <li><strong>Up to 200,000 visits per month</strong></li>
                </ul>
                <p><a href="javascript:;" class="button">Get started</a></p>
            </div>
        </div>

    </div> <!-- /.pricing-tables -->

    <hr>

    <h1 id="side-images-section">Side Images</h1>

    <section class="side-image">
        <div class="images-wrapper"></div>
        <div class="side-image-content">
            <h4>Positioning</h4>
            <h1>Stand out from your competitors</h1>
            <p><strong>Make customers choose <em>your</em> business</strong></p>
            <p>We build beautiful, intuitive and easily accessible websites that stand head and shoulders above your competitors’. We teach you how to captivate your audience so they’ll never look elsewhere.</p>
            <a class="button" href="javascript:;">Get started</a>
        </div>
    </section>

    <hr>

    <h1 id="icon-bullets-section">Icon Bullets</h1>

    <ul class="bullets">
        <li class="bullet">
            <div class="bullet-icon bullet-icon-1">
                <img src="<?php echo bloginfo('stylesheet_directory') ?>/images/icons/moortor-shield-100px.png" alt="">
            </div>
            <div class="bullet-content">
                <h2>Like a web agency, but better</h2>
                <p>The convenience of a pay-per-month site builder but with your very own web experts at your fingertips. We'll build your site, you stick to what you're good at: selling.</p>
            </div>
        </li>  
        <li class="bullet">
            <div class="bullet-icon bullet-icon-2">
                <img src="<?php echo bloginfo('stylesheet_directory') ?>/images/icons/wordpress-100px.png" alt="">
            </div>
            <div class="bullet-content">
                <h2>The world's most popular CMS</h2>
                <p>We build our websites on top of the world-beating WordPress Content Management System (<abbr title="Content Management System">CMS</abbr>). WordPress empowers you to take control of your site's content.</p>
            </div>
        </li>  
        <li class="bullet">
            <div class="bullet-icon bullet-icon-3">
                <img src="<?php echo bloginfo('stylesheet_directory') ?>/images/icons/lightning-fast-100px.png" alt="">
            </div>
            <div class="bullet-content">
                <h2>Lightning fast hosting</h2>
                <p>Our servers are finely-tuned for serving WordPress. An aggressive cache keeps things quick and our Content Delivery Network (<abbr title="Content Delivery Network">CDN</abbr>) ensures your site is responsive wherever in the world your customers are.</p>
            </div>
        </li>
        <li class="bullet">
            <div class="bullet-icon bullet-icon-4">
                <img src="<?php echo bloginfo('stylesheet_directory') ?>/images/icons/secure-100px.png" alt="">
            </div>
            <div class="bullet-content">
                <h2>Totally secure</h2>
                <p>Maintenance and updates are included with all of our plans. Your site will be backed up daily. In the unlikely event your site does get hacked or infected, we guarantee to repair the damage at no extra cost.</p>
            </div>
        </li>
        <li class="bullet">
            <div class="bullet-icon bullet-icon-5">
                <img src="<?php echo bloginfo('stylesheet_directory') ?>/images/icons/your-data-100px.png" alt="">
            </div>
            <div class="bullet-content">
                <h2>Your data</h2>
                <p>We give you access to analytics so you can keep an eye on how your site is doing. We don't hold your data or content to ransom. If you decide to leave us we'll happily export all your data so you can use it elsewhere.</p>
            </div>
        </li>
        <li class="bullet">
            <div class="bullet-icon bullet-icon-6">
                <img src="<?php echo bloginfo('stylesheet_directory') ?>/images/icons/members-100px.png" alt="">
            </div>
            <div class="bullet-content">
                <h2>Member benefits</h2>
                <p>We provide extensive training videos from right inside your WordPress dashboard. Moortor members also receive a curated newsletter of how-to guides and tutorials to help you get the best out of your website. From time-to-time you'll also get access to exclusive deals from our partners.</p>
            </div>
        </li>
    </ul>

    <hr>

    <h1 id="cards-section">Cards</h1>

    <section class="cards benefits">
        <div class="card">
            <div class="card-image">
                <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/mountains.png" alt="">
            </div>
            <div class="card-header">
                Stand out from your competitors
            </div>
            <div class="card-copy">
                <p><strong>Make customers choose <em>your</em> business</strong></p>
                <p>We build beautiful, intuitive and easily accessible websites that stand head and shoulders above your competitors’. We teach you how to captivate your audience so they’ll never look elsewhere.</p>
            </div>
        </div>

        <div class="card">
            <div class="card-image">
                <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/mountains-2.png" alt="">
            </div>
            <div class="card-header">
                Generate &amp; convert leads
            </div>
            <div class="card-copy">
                <p><strong>Increase your exposure and stop missing opportunities</strong></p>
                <p>Get your business noticed in the search engines. Convert leads with effective lead capture forms and landing pages.</p>
            </div>
        </div>

        <div class="card">
            <div class="card-image">
                <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/mountains-3.png" alt="">
            </div>
            <div class="card-header">
                Increase sales
            </div>
            <div class="card-copy">
                <p><strong>Open new sales channels and sell more product</strong></p>
                <p>Start selling online with the world’s most popular eCommerce software. Customised for your business, simple to use and optimised for those all important search engines.</p>
            </div>
        </div>

        <div class="card">
            <div class="card-image">
                <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/mountains-4.png" alt="">
            </div>
            <div class="card-header">
                Control your budget
            </div>
            <div class="card-copy">
                <p><strong>Know your costs up-front with simple monthly payments</strong></p>
                <p>We aren’t a normal web agency (<a href="http://www.wpmusketeer.com/the-agency-model-is-dead-grow-an-online-community-build-a-successful-business/">we don’t believe in the agency model</a>). We’ve turned web design and development into a product. Pick your tier and pay a fixed monthly fee. We fund the initial build of your site in return for a 12 month commitment. After that, pay one month at a time and cancel whenever you like. If your budget doesn’t stretch to one of our tiers, check out WP Musketeer for a <a href="http://www.wpmusketeer.com">guide to bootstrapping your own online business</a>.</p>
            </div>
        </div>
    </section>

    <hr>

    <h1 id="badges-section">Badges</h1>

    <p>
        <span class="badge">4</span>
        <span class="badge-alert">4</span>
        <span class="badge-error">4</span>
        <span class="badge-notice">4</span>
        <span class="badge-success">4</span>
    </p>

    <hr>

    <section class="textures" id="textures-section">
        <h1>Textures</h1>
        <div class="texture-example texture-inverted">Inverted</div>
        <div class="texture-example texture-normal">Normal</div>
    </section>

    <hr>

    <h1 id="modals-section">Modals</h1>

    <section class="modal">
        <label for="modal-1">
            <div class="modal-trigger">Click for Modal</div>
        </label>
        <input class="modal-state" id="modal-1" type="checkbox" />
        <div class="modal-fade-screen">
            <div class="modal-inner">
                <div class="modal-close" for="modal-1"></div>
                <h1>Modal Title</h1>
                <p class="modal-intro">Intro text lorem ipsum dolor sit ametm, quas, eaque facilis aliquid cupiditate tempora cumque ipsum accusantium illo modi commodi  minima.</p>
                <p class="modal-content">Body text lorem ipsum dolor ipsum dolor sit sit possimus amet, consectetur adipisicing elit. Itaque, placeat, explicabo, veniam quos aperiam molestias eriam molestias molestiae suscipit ipsum enim quasi sit possimus quod atque nobis voluptas earum odit accusamus quibusdam. Body text lorem ipsum dolor ipsum dolor sit sit possimus amet.</p>
            </div>
        </div>
    </section>

    <hr>
    <h1 id="grid-items">Grid Items</h1>
<div class="grid-items-lines">
  <a href="javascript:void(0)" class="grid-item">
    <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/placeholder_logo_1_dark.png" alt="">
    <h1>Grid Item</h1>
    <p>Lorem ipsum dolor sit amet, elit. Rem, illum.</p>
  </a>
  <a href="javascript:void(0)" class="grid-item">
    <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/placeholder_logo_3_dark.png" alt="">
    <h1>Another Item</h1>
    <p>Lorem ipsum consectetur dolor sit amet, consectetur adipisicing elit.</p>
  </a>
  <a href="javascript:void(0)" class="grid-item">
    <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/placeholder_logo_2_dark.png" alt="">
    <h1>Another Grid Item</h1>
    <p>Lorem ipsum dolor sit amet, elit.</p>
  </a>
  <a href="javascript:void(0)" class="grid-item">
    <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/placeholder_logo_2_dark.png" alt="">
    <h1>Grid Item</h1>
    <p>Lorem ipsum dolor sit amet, elit. Rem, illum.</p>
  </a>
  <a href="javascript:void(0)" class="grid-item grid-item-big">
    <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/placeholder_logo_2_dark.png" alt="">
    <h1>Wider Grid Item</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, illum.</p>
  </a>
  <a href="javascript:void(0)" class="grid-item">
    <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/placeholder_logo_3_dark.png" alt="">
    <h1>A Grid Item</h1>
    <p>Lorem ipsum dolor sit amet, elit. Rem, illum.</p>
  </a>
  <a href="javascript:void(0)" class="grid-item">
    <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/placeholder_logo_1_dark.png" alt="">
    <h1>Item</h1>
    <p>Lorem ipsum dolor sit amet, elit. Rem, illum.</p>
  </a>
  <a href="javascript:void(0)" class="grid-item">
    <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/placeholder_logo_2_dark.png" alt="">
    <h1>Last Grid Item</h1>
    <p>Lorem ipsum dolor sit amet, elit. Rem, illum.</p>
  </a>
  <div class="right-cover"></div>
  <div class="bottom-cover"></div>
</div>
<hr>
<h1 id="ribbon-box">Ribbon Box</h1>
<div class="ribbon-box">
  <div class="ribbon-wrapper">
    <div class="ribbon">Ribbon</div>
  </div>
</div>
<hr>
<h1 id="video-wrapper">Video Wrapper</h1>
<div class="video">
  <div class="video-wrapper">
      <iframe src="http://www.youtube.com/embed/8ItNE_DX6Cc?showinfo=0&iv_load_policy=3&controls=0" frameborder="0" allowfullscreen></iframe>
  </div>
</div>
<hr>

<h1 id="tooltip">Tool Tip</h1>

<div class="tooltip-item">
  Hover for Tooltip
  <div class="tooltip">
    <p>Lorem ipsum doldae oluptate aperiam unde voluptates quas.</p>
  </div>
</div>
<hr>
<h1 id="sliding-panel">Sliding Panel</h1>

<button type="button" class="js-menu-trigger sliding-panel-button">
  Click for Sliding Panel
</button>

<nav class="js-menu sliding-panel-content">
  <ul>
    <li><a href="javascript:void(0)">Item 1</a></li>
    <li><a href="javascript:void(0)">Item 2</a></li>
    <li><a href="javascript:void(0)">Item 3</a></li>
  </ul>
</nav>

<div class="js-menu-screen sliding-panel-fade-screen"></div>

<hr>


<h1 id="google-map">Google Map</h1>

<div id="map_canvas"></div>
<hr>

<!--
<h1 id="slick-slider">Slick Slider</h1>
<div class="slick-slider">
 <div class="centered-horizontal-slides">
    <div><img src="http://lorempixel.com/680/400/cats" alt="lorem pixel image"></div>
    <div><img src="http://lorempixel.com/680/400/sports" alt="lorem pixel image"></div>
    <div><img src="http://lorempixel.com/680/400/business" alt="lorem pixel image"></div>
    <div><img src="http://lorempixel.com/680/400/" alt="lorem pixel image"></div>
</div>
</div>
-->

<!--
Add the code below to the bottom of your page, just before the closing </body> tag.
Edit myLatlng and the other variables.

Find syntax for Features that can be styled here:

https://developers.google.com/maps/documentation/javascript/reference#MapTypeStyleFeatureType

Or use a service such as:

http://software.stadtwerk.org/google_maps_colorizr/#
http://gmaps-samples-v3.googlecode.com/svn/trunk/styledmaps/wizard/index.html
https://developers.google.com/maps/documentation/javascript/tutorial
-->



<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
  var bittersMap = (function () {
    var myLatlng = new google.maps.LatLng(59.342457, 18.057340),
        mapCenter = new google.maps.LatLng(59.340458, 18.057340),
        mapCanvas = document.getElementById('map_canvas'),
        mapOptions = {
          center: mapCenter,
          zoom: 13,
          scrollwheel: false,
          draggable: true,
          disableDefaultUI: true,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        },
        map = new google.maps.Map(mapCanvas, mapOptions),
        contentString =
          '<div id="content">'+
          '<div id="siteNotice">'+
          '</div>'+
          '<h1 id="firstHeading" class="firstHeading">thoughtbot</h1>'+
          '<div id="bodyContent"'+
          '<p>Sveavägen 98</p>'+
          '</div>'+
          '</div>',
        infowindow = new google.maps.InfoWindow({
          content: contentString,
          maxWidth: 300
        }),
        marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
          title: 'thoughtbot (Sweden)'
        });

    return {
      init: function () {
        map.set('styles', [{
          featureType: 'landscape',
          elementType: 'geometry',
          stylers: [
            { hue: '#ffff00' },
            { saturation: 30 },
            { lightness: 10}
          ]}
        ]);

        google.maps.event.addListener(marker, 'click', function () {
          infowindow.open(map,marker);
        });
      }
    };
  }());

  bittersMap.init();
</script>

<?php
}

genesis();