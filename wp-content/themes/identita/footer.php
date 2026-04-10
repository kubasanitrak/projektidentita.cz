 	<!-- PARTNERS -->
		<div class="section-content section-content--partners scroll-trigger" id="content_partners_ID">
			<div class="inner-content-wrapper"> 

				<?php
					$args = array(
					    'post_type' => 'thanks',
					    'posts_per_page' => -1,
					    'post_status'    => array( 'publish' ),
					    // 'orderby' => 'title',
					    // 'order'   => 'DESC'
					    // 'order'   => 'ASC'
					);
				?>
				<?php $the_query = new WP_Query( $args ); ?>
				<?php if ( $the_query->have_posts() ) : ?>
				    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

				    	<?php 
				    		$POST_ID = get_the_ID();
							$SHOW_HEADER = get_field('show_title', $POST_ID);
						?>

						<?php
							if ($SHOW_HEADER) :
						?>
						<div class="inner-content">
							<div class="section-header--title_container">
								<h4 class="section-header--title"> <?php the_title(); ?> </h4>
							</div>
						</div>
						<?php
							endif;
						?>
						<div class="inner-content">
							<?php the_content(); ?>
						</div>
					<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
				<?php endif; ?>	
			</div>
		</div><!-- END PARTNERS -->

	<?php if ( is_active_sidebar( 'nl-widget-area' ) ) : ?>
		<!-- NL WIDGET -->
		<div class="section-content section-content--newsletter" id="content_newsletter_ID">
			<div class="inner-content-wrapper">
				<?php dynamic_sidebar( 'nl-widget-area' ); ?>
				<?php if ( is_active_sidebar( 'nl-form-widget-area' ) ) : ?>
					<div class="inner-content">
					<!-- NL FORM WIDGET -->
						<?php dynamic_sidebar( 'nl-form-widget-area' ); ?>
					<!-- END NL FORM WIDGET -->
					</div>
			<?php endif; ?>	
			</div>
		</div>
	<?php endif; ?>	

	<?php if ( is_active_sidebar( 'press-widget-area' ) ) : ?>
		<!-- PRO MÉDIA -->
		<div class="section-header section-header--press scroll-trigger" id="header_press_ID">
			<div class="section-header--title_container">
				<?php dynamic_sidebar( 'press-widget-area' ); ?>
				</div>
			</div>
	<?php endif; ?>	



	<?php if ( is_active_sidebar( 'footer-widget-area' ) ) : ?>
		<!-- FOOTER -->
				<?php dynamic_sidebar( 'footer-widget-area' ); ?>
	<?php endif; ?>	

	</div> <!-- END WRAPPER -->




<!-- Javascript at the bottom for fast page loading -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/libs/jquery-3.6.1.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/libs/ls.unveilhooks.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/libs/gsap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/libs/ScrollToPlugin.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/libs/ScrollTrigger.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/libs/CSSPlugin.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/libs/CSSRulePlugin.min.js"></script>

		<script>
			(function(){
				const debounce = function(func, delay){
					let timer;
					return function () {     //anonymous function
					const context = this; 
					const args = arguments;
					clearTimeout(timer); 
					timer = setTimeout(()=> {
						  func.apply(context, args)
						}, delay);
					}
				}
				// THROTTLE
				const throttle = (func, limit) => {
					let lastFunc;
					let lastRan;
					return function() {
						const context = this;
						const args = arguments;
						if (!lastRan) {
						  func.apply(context, args)
						  lastRan = Date.now();
						} else {
						  clearTimeout(lastFunc);
						  lastFunc = setTimeout(function() {
							  if ((Date.now() - lastRan) >= limit) {
								func.apply(context, args);
								lastRan = Date.now();
							  }
						   }, limit - (Date.now() - lastRan));
						}
					}
				}

				const arrowLandscape = () => {
					let _isLand = false;
					_isLand = window.innerWidth > window.innerHeight ? true : false;
					return _isLand;
				}
				/* COOKIE RELATED FUNCTIONS */					
				function setCookie(name,value,exp_minutes) {
					var d = new Date();
					d.setTime(d.getTime() + (exp_minutes*60*1000));
					var expires = "expires=" + d.toGMTString();
					document.cookie = name + "=" + value + ";" + expires + "; SameSite=Lax;";
				}

				function getCookie(name) {
					var cname = name + "=";
					var decodedCookie = decodeURIComponent(document.cookie);
					var ca = decodedCookie.split(';');
					for(var i = 0; i < ca.length; i++){
					    var c = ca[i];
					    while(c.charAt(0) == ' '){
					        c = c.substring(1);
					    }
					    if(c.indexOf(cname) == 0){
					        return c.substring(cname.length, c.length);
					    }
					}
					return "";
				}

				function deleteCookie(name) {
					var d = new Date();
					d.setTime(d.getTime() - (60*60*1000));
					var expires = "expires=" + d.toGMTString();
					// document.cookie = name + "=;" + expires + ";path=/";
					document.cookie = name + "=;" + expires + "; SameSite=Lax;";
				}


				var getPreviousSibling = function (elem, selector) {
					var sibling = elem.previousElementSibling;
					if (!selector) return sibling;
					while (sibling) {
						if (sibling.matches(selector)) return sibling;
						sibling = sibling.previousElementSibling;
					}
				}


				//*/ / / / / / / / / / / 
				// IOS and Android detection => ASUME MOBILE=TOUCH DEVICES
				const _isSafari = !!navigator.userAgent.match(/Version\/[\d\.]+.*Safari/);
				const _isIOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
				
				const ua = navigator.userAgent.toLowerCase();
				const _isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");

				const wrapper = document.getElementById('wrapper-id'),
					content = document.getElementById("contentID"),
					body = document.body,
					_siteHEADER = document.getElementById("headerID"),
					_siteLOGO = document.getElementById("logoID"),
					_colorSwitch = document.getElementById("coloriseBtnID"),
					_colorSwitch2 = document.getElementById("coloriseBtnID2"),
					_menuBTN = document.getElementById("menuBtnID"),
					_scrollTopBTN = document.getElementById("scroll-top-ID"),
					_bloomberg = document.getElementById("newsrunID"),
					options = {
						root: null, // default, use viewport
						// rootMargin: '0px 0px -50% 0px',
						// threshold: 0.5 // half of item height
						// threshold: [0, 1]
						threshold: 1
					};
				let $scrollDir = "down",
					lastScrollTop,
					iOis_supp = false,
					offsetY,
					_len,
					_themeGet,
					_themeSet,
					_isLandscape = false,
					$sT,
					transT = 0.875,
					observedItem = document.querySelectorAll(".scroll-trigger"),
					observedItem2 = document.querySelectorAll(".scroll-trigger-2"),
					_photogalleryItem = document.querySelectorAll(".photogallery-item"),
					photoArray = [],
					_identitaInitW,
					_identitaInitH,
					scrollTabItem = document.querySelectorAll(".watch-for-pin");

				window.addEventListener('load', docLoaded);
				
				wrapper.addEventListener('scroll', 
					throttle(function () {
						toggleBloomberg();
						toggleCGD();
						toggleMenu(false);
					}, 500)
				);

				_scrollTopBTN.addEventListener('click', scrollToTop);

				_colorSwitch.addEventListener('change', colorSwitchState);
				_colorSwitch2.addEventListener('change', colorSwitchState);


				function docLoaded() {
					window.removeEventListener('load', docLoaded);	
					if(wrapper.classList.contains('loading') ) {
						wrapper.classList.remove('loading');
					}
					gsap.delayedCall(2.3, setUpIObserver);

					setUpNewsRun();

					checkUrl();

					if(!_isIOS && !_isAndroid) {
						wrapper.classList.add('is-desktop');
					}

					if(_isSafari) body.classList.add('safari_only');
				}

				

				function colorSwitchState(event) {
					// CHECKED = ODBARVIT
					_themeGet = body.getAttribute('data-theme');
					_themeSet = this.checked ? "color" : "no-color";
					body.setAttribute('data-theme', _themeSet);
					setCookie("color_scheme", _themeSet, 5);
				}

				function toggleMenu(slideUp) {
					if(window.innerHeight > window.innerWidth) {
						_menuBTN.checked = slideUp;
					}
				}
				function toggleBloomberg() {
					if(!_bloomberg) return;
					$sT = $('#wrapper-id').scrollTop();
					$scrollDir = $sT > lastScrollTop ? "down" : "up";
					lastScrollTop = $sT;
					if ($sT > 50) {
// console.log("bloomberg oFF");
						_bloomberg.classList.add("slide-up");
						document.getElementById("header_identitaID").classList.add("badge-slide-up");
						document.body.classList.remove('with-bloomberg');
					} else {
// console.log("bloomberg on");
						_bloomberg.classList.remove("slide-up");
						document.getElementById("header_identitaID").classList.remove("badge-slide-up");
						document.body.classList.add('with-bloomberg');
					}
				}
				function scrollToTop() {
					$len = transT + ($(".wrapper").scrollTop() / $(".wrapper").innerHeight()) * 0.15;
					TweenMax.to(wrapper, $len, {
						scrollTo: {
							y: 0,
							autoKill: false
						},
						ease: Power1.easeInOut
					});
				}

				function setUpIObserver() {

					wrapper.classList.add('loaded');

					var observer = new IntersectionObserver(
					  function (entries, observer) {
						entries.forEach(function (entry) {
						  if (entry.intersectionRatio > 0) {
							entry.target.classList.add("inView");
						  } else {
							entry.target.classList.remove("inView");
						  }
						});
					  },
					  {
						rootMargin: "0px 0px -100px 0px",
						threshold: 0
					  }
					);
					observedItem.forEach(function (obs) {
					  observer.observe(obs);
					});
					var observer2 = new IntersectionObserver(
					  function (entries, observer) {
						entries.forEach(function (entry) {
						  if (entry.intersectionRatio > 0) {
							entry.target.classList.add("inView");
						  } else {
							entry.target.classList.remove("inView");
						  }
						});
					  },
					  {
						rootMargin: "0px 0px -300px 0px",
						threshold: 0
					  }
					);
					observedItem2.forEach(function (obs) {
					  observer2.observe(obs);
					});
				}
				let		$scroll_ID,
						tempVal,
						idArray = new Array(),
						_headersArray = new Array(),
						_headers = document.querySelectorAll(".section-header"),
						classArray = document.querySelectorAll(".section-content");

				function isLandscape() {
					if(window.innerWidth<500) {
					}
					_isLandscape = window.innerWidth > window.innerHeight ? true : false;
					return _isLandscape;
				}

				// let _headerH = Math.round($(".wrapper").innerHeight() * 0.08),
				// let _headerH = Math.round($(".wrapper").innerHeight() * 0.065);
				let _logoConst = isLandscape() ? 0.08 : 0.065;
				let _headerH = Math.round($(".wrapper").innerHeight() * _logoConst);
					let _scrollTabH = Math.round($(".scrollTab").innerHeight()),
					_overlapH = Math.round($("#footer_pribeh_ID").innerHeight()),
					_overlapTabs = Math.round($(".wrapper").innerHeight() * 0.15);


				for (var i = 0; i < classArray.length; i++) {
					if(classArray[i].id) {
						idArray.push("#" + classArray[i].id);
						tempVal = Math.round( $("#" + classArray[i].id).offset().top - _headerH - _overlapTabs - _scrollTabH);
						$("#" + classArray[i].id).data("scroll_value", tempVal);
					}
				}
				for (var a = 0; a < _headers.length; a++) {
					if(_headers[a].id) _headersArray.push("#" + _headers[a].id);
				}

// 				function setScrollToValues() {
// 					for (var i = 0; i < classArray.length; i++) {
// 						if(classArray[i].id) {
// 							tempVal = Math.round( $("#" + classArray[i].id).offset().top - _headerH - _overlapTabs - (_scrollTabH * 1.85));
// 							$("#" + classArray[i].id).data("scroll_value", tempVal);
// // console.log(classArray[i].id + " scroll_value=" + tempVal);
// 						}
// 					}
// 				}

				

				let wrapperResized = debounce(function() {
// console.log("resized");
					setWrapperHOnPortrait();
				}, 550);

				// window.addEventListener("resize", wrapperResized);
				// _menuBTN.addEventListener('change', wrapperResized);

// PRO VŠECHNY ITEMS CLASSARRAY VYTVOŘIT DALŠÍ ARRAY NEBO PŘIDAT K ARRAY VALUE SCROLL_Y
// V EVENT LISTENER FUNKCI (CLICK) PAK PODLE TEMP INDEXU VYBRAT PŘÍSLUŠNÝ INDEX V SCROLL_Y ARRAY === topY
// HODNOTY FUNGUJÍ JEN PŘI VÝCHOZÍM STAVU STRÁNKY, PŘI LOADU A PŘI RESIZE SET SCROLLTO VALUES

				$(".scrollTab, .menu").on("click", "a", function (event) {

					if (this.classList.contains("scrollLink")) event.preventDefault();

					var id2scroll;
					var $this = $(this);
					id2scroll = $this.attr("href");

					if (idArray.indexOf(id2scroll) != -1) {
						animScroll(id2scroll);
						return;
					}

// console.log(topY);

				});

				function animScroll(paramID) {
					$len = transT + ($(".wrapper").scrollTop() / $(".wrapper").innerHeight()) * 0.15;

					let _offset = _headerH * 0.08 + _overlapTabs + _scrollTabH * 1.85;

					TweenMax.to(wrapper, $len, {
						scrollTo: {
							y: paramID,
							offsetY: _offset,
							autoKill: false
						},
						ease: Power1.easeInOut
					});

					var hash = "#" + paramID.split("#")[1];
// console.log(hash);
					history.pushState(null, null, hash);
				}

				$(".section-footer").on("click", function (event) {

					var id2scroll;
					var $this = $(this);
					id2scroll = $this.data("scrollto");

					if (idArray.indexOf(id2scroll) != -1) {
						animScroll(id2scroll);
						return;
					}
				});


				function setUpNewsRun() {
					// if(!document.querySelectorAll('.newsrun--item')) return;
					const boxes = gsap.utils.toArray(".newsrun--item");
					const loop = horizontalLoop(boxes, {paused: false,repeat: -1,});
				}
				
				function checkUrl() {
					window.removeEventListener('load', checkUrl);

					if (!window.location.hash) { 
						return;
		            }

	                let _urlHash = window.location.hash.substr(1);
// console.log(_urlHash);
	                const _hashArr = [ "pribeh", "tvcyklus", "vystava", "kniha", "film" ];

		            if (_hashArr.indexOf(_urlHash) != -1) {
						let _tempIndex = _hashArr.indexOf(_urlHash);
// console.log(_tempIndex);
// console.log(idArray);
// console.log(idArray[_tempIndex]);
						TweenMax.delayedCall(1.65, animScroll, [idArray[_tempIndex]]);
					}
				}

				/*
				This helper function makes a group of elements animate along the x-axis in a seamless, responsive loop.

				Features:
				 - Uses xPercent so that even if the widths change (like if the window gets resized), it should still work in most cases.
				 - When each item animates to the left or right enough, it will loop back to the other side
				 - Optionally pass in a config object with values like "speed" (default: 1, which travels at roughly 100 pixels per second), paused (boolean),  repeat, reversed, and paddingRight.
				 - The returned timeline will have the following methods added to it:
				   - next() - animates to the next element using a timeline.tweenTo() which it returns. You can pass in a vars object to control duration, easing, etc.
				   - previous() - animates to the previous element using a timeline.tweenTo() which it returns. You can pass in a vars object to control duration, easing, etc.
				   - toIndex() - pass in a zero-based index value of the element that it should animate to, and optionally pass in a vars object to control duration, easing, etc. Always goes in the shortest direction
				   - current() - returns the current index (if an animation is in-progress, it reflects the final index)
				   - times - an Array of the times on the timeline where each element hits the "starting" spot. There's also a label added accordingly, so "label1" is when the 2nd element reaches the start.
				*/

				function horizontalLoop(items, config) {
					items = gsap.utils.toArray(items);
					if(!items[0]) return;
					config = config || {};
					let tl = gsap.timeline({repeat: config.repeat, paused: config.paused, defaults: {ease: "none"}, onReverseComplete: () => tl.totalTime(tl.rawTime() + tl.duration() * 100)}),
						length = items.length,
						startX = items[0].offsetLeft,
						times = [],
						widths = [],
						xPercents = [],
						curIndex = 0,
						pixelsPerSecond = (config.speed || 1) * 100,
						snap = config.snap === false ? v => v : gsap.utils.snap(config.snap || 1), // some browsers shift by a pixel to accommodate flex layouts, so for example if width is 20% the first element's width might be 242px, and the next 243px, alternating back and forth. So we snap to 5 percentage points to make things look more natural
						totalWidth, curX, distanceToStart, distanceToLoop, item, i;
					gsap.set(items, { // convert "x" to "xPercent" to make things responsive, and populate the widths/xPercents Arrays to make lookups faster.
						xPercent: (i, el) => {
							let w = widths[i] = parseFloat(gsap.getProperty(el, "width", "px"));
							xPercents[i] = snap(parseFloat(gsap.getProperty(el, "x", "px")) / w * 100 + gsap.getProperty(el, "xPercent"));
							return xPercents[i];
						}
					});
					gsap.set(items, {x: 0});
					totalWidth = items[length-1].offsetLeft + xPercents[length-1] / 100 * widths[length-1] - startX + items[length-1].offsetWidth * gsap.getProperty(items[length-1], "scaleX") + (parseFloat(config.paddingRight) || 0);
					for (i = 0; i < length; i++) {
						item = items[i];
						curX = xPercents[i] / 100 * widths[i];
						distanceToStart = item.offsetLeft + curX - startX;
						distanceToLoop = distanceToStart + widths[i] * gsap.getProperty(item, "scaleX");
						tl.to(item, {xPercent: snap((curX - distanceToLoop) / widths[i] * 100), duration: distanceToLoop / pixelsPerSecond}, 0)
						  .fromTo(item, {xPercent: snap((curX - distanceToLoop + totalWidth) / widths[i] * 100)}, {xPercent: xPercents[i], duration: (curX - distanceToLoop + totalWidth - curX) / pixelsPerSecond, immediateRender: false}, distanceToLoop / pixelsPerSecond)
						  .add("label" + i, distanceToStart / pixelsPerSecond);
						times[i] = distanceToStart / pixelsPerSecond;
					}
					function toIndex(index, vars) {
						vars = vars || {};
						(Math.abs(index - curIndex) > length / 2) && (index += index > curIndex ? -length : length); // always go in the shortest direction
						let newIndex = gsap.utils.wrap(0, length, index),
							time = times[newIndex];
						if (time > tl.time() !== index > curIndex) { // if we're wrapping the timeline's playhead, make the proper adjustments
							vars.modifiers = {time: gsap.utils.wrap(0, tl.duration())};
							time += tl.duration() * (index > curIndex ? 1 : -1);
						}
						curIndex = newIndex;
						vars.overwrite = true;
						return tl.tweenTo(time, vars);
					}
					tl.next = vars => toIndex(curIndex+1, vars);
					tl.previous = vars => toIndex(curIndex-1, vars);
					tl.current = () => curIndex;
					tl.toIndex = (index, vars) => toIndex(index, vars);
					tl.times = times;
				  tl.progress(1, true).progress(0, true); // pre-render for performance
				  if (config.reversed) {
				    tl.vars.onReverseComplete();
				    tl.reverse();
				  }
					return tl;
				}
				

			})();
		</script>	

	 <!-- START WP_FOOTER() -->
	<?php wp_footer(); ?>
	<!-- END WP_FOOTER() -->
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/wp-block-fix-style.css?v21-03-2025.01" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/identita-simple-lightbox-override.css?v21-03-2025.01" />