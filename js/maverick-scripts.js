'use strict';

/*
 * Sticky Logo
 **/

(function(){
    let mavStickyLogo = document.querySelector('.mav-sticky-logo');
    if (mavStickyLogo == null) {
        return;
    }
    addMultipleListeners(window,['scroll','resize'],function(){
        const mavHeaderSection = document.querySelector('#mavid-sec-header-menu');
        if (mavHeaderSection.offsetTop > 80) {
            mavStickyLogo.classList.add('show-logo');
        } else {
            mavStickyLogo.classList.remove('show-logo');
        }
    },false);
})();

/*
 * Toggle Site Search
 */
(function(){
    document.querySelector('.mav-site-search-icon').addEventListener('click', function(){
        document.querySelector('.mav-site-search-wrapper').classList.toggle('mav-collapse');
        this.classList.toggle('fa-search');
        this.classList.toggle('fa-times');
    });
})();

/*
 * Tool Tip
 **/

let mavToolTips = document.querySelectorAll('[data-tooltip]');

if (mavToolTips.length > 0) {
    let mavToolTipElement = document.createElement('span');
    mavToolTipElement.classList.add('mav-tool-tip');
    document.body.appendChild(mavToolTipElement);

    let mavToolTip = document.querySelector('.mav-tool-tip');

    function mavFade(){
        mavToolTip.style.opacity = 0;
    }

    let mavTimeOut = setTimeout(mavFade, 1500);

    mavToolTips.forEach(function(e){
        // Mouse over
        e.addEventListener('mouseenter',function(e){
            // Xóa nội dung cũ
            mavToolTip.innerText = '';
            clearTimeout(mavTimeOut);
            let mavText = document.createTextNode(e.target.dataset.tooltip);
            // Thay bằng nội dung mới
            mavToolTip.appendChild(mavText);
            mavToolTip.style.opacity = 1;
            mavTimeOut = setTimeout(mavFade, 1500);
        });
        // Mouse leave
        e.addEventListener('mouseleave',function(){
            mavToolTip.style.opacity = 0;
        });
    });

    // document.onmousemove = mavDisplayToolTip;

    function mavDisplayToolTip(e){
        let mavWindowW = window.innerWidth;
        let mavWindowH = window.innerHeight;
        let mavObjW = mavToolTip.offsetWidth;
        let mavObjH = mavToolTip.offsetHeight;
        // console.log(window.innerWidth);
        let mavY = Math.round(e.clientY)+(mavObjH/2);
        let mavX = Math.round(e.clientX)-(mavObjW/2);
        if (e.clientX < mavObjW ) {
            mavX = Math.round(e.clientX);
        }
        if ( e.clientX > (mavWindowW - mavObjW) ) {
            mavX = Math.round(e.clientX - mavObjW);
        }
        mavToolTip.style.top = mavY+'px';
        mavToolTip.style.left = mavX+'px';
    }
}

/*
 * Hide Empty Paginate Links
 **/

(function mavHideEmptyPaginate(){
    let mavPaginateLinks = document.getElementById('mavid-paginate-links');
    if (mavPaginateLinks !== null) {
        if (mavPaginateLinks.innerText == '') {
                mavPaginateLinks.style.opacity = 0;
        }
    }
})();

/*
 * Scroll to Top button
 * Args:
 * mavEle: Element to create
 * mavClass: button class
 * mavTitle: button hover title
 */

function mavf_btn_scroll_to_top(mavEle = 'span', mavClass = 'mav-btn-top', mavTitle = 'Lên đầu trang'){
    let mavElement = document.createElement(mavEle);
    mavElement.classList.add(mavClass);
    mavElement.setAttribute('title',mavTitle);
    document.body.appendChild(mavElement);

    const mavButtonTop = document.querySelector('.'+mavClass);

    mavButtonTop.addEventListener('click',function(){
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    })

    window.addEventListener('scroll',mavf_show_btn_to_top);

    function mavf_show_btn_to_top(){
        if (window.pageYOffset > 200) {
            mavButtonTop.style.visibility = 'visible';
            mavButtonTop.style.opacity = 1;
            return;
        } else {
            mavButtonTop.style.opacity = 0;
            mavButtonTop.style.visibility = 'hidden';
            return;
        }
    }
}

if (typeof mavf_btn_scroll_to_top === 'function') {
    mavf_btn_scroll_to_top('span','mav-btn-top','Lên đầu trang');
}

function mavf_go_back_button(mavEle = 'span', mavClass = 'mav-btn-back', mavTitle = 'Trở lại trang trước') {
    const mavElement = document.createElement(mavEle);
    mavElement.classList.add(mavClass);
    mavElement.setAttribute('title',mavTitle);
    document.body.appendChild(mavElement);

    const mavButtonBack = document.querySelector('.'+mavClass);
    mavButtonBack.addEventListener('click',function(){
        window.history.back();
    })
}
if (typeof mavf_go_back_button === 'function') {
    if (window.history.length > 2) {
        mavf_go_back_button();
    }
}

(function mavf_smooth_scroll(){
    const mavScrolls = document.querySelectorAll('[data-scroll]');
    for (const mavScroll of mavScrolls){
        mavScroll.addEventListener('click',function(){
            const mavScrollTo = document.getElementById(this.dataset.scroll);
            const mavBehavior = this.dataset.behavior ? this.dataset.behavior : 'smooth';
            window.scrollTo({
                top: mavScrollTo.offsetTop,
                behavior: mavBehavior
            });
        });
    }
})();

/**
 * Accordion
 */

 // (function mavf_accordion(){
//     const mavTriggers = document.querySelectorAll('.mav-accordion-trigger');
//     console.log('mavTriggers: ', mavTriggers);
//     for (const mavTrigger of mavTriggers){
//         mavTrigger.setAttribute('title','Click to open');
//         mavTrigger.addEventListener('click',function(){
//             this.dataset.state = (this.dataset.state == 'close') ? 'open' : 'close';
//             if (this.dataset.state == 'close') {
//                 this.setAttribute('title','Click to open');
//             } else {
//                 this.setAttribute('title','Click to close');
//             }
//         });
//     }
// })();

function mavf_accordion(e){
    const mavTrigger = e;
    // mavTrigger.setAttribute('title','Click to expand');
    mavTrigger.dataset.state = (mavTrigger.dataset.state == 'close') ? 'open' : 'close';
    if (mavTrigger.dataset.state == 'close') {
        mavTrigger.setAttribute('title','Click to expand');
    } else {
        mavTrigger.setAttribute('title','Click to close');
    }
}

/**
 * Close Button
 */
function mavf_close_btn(mavElement, mavElementToClose = '.mavjs-close'){
    mavElement.closest(mavElementToClose).remove();
}

/**
 * Modal Box
 */

function mavf_create_modal_box(mavArgs= {
    header      : '<p class="mav-modal-title">Modal Header</p>',
    body        : '<p>Modal Body</p>',
    footer      : '<p>Modal Footer</p>',
    headerClass : 'mav-modal-header',
    bodyClass   : 'mav-modal-body',
    footerClass : 'mav-modal-footer'
}){
    const mavModal = document.createElement('div');
    mavModal.classList = 'mav-modal mavjs-close';
    mavModal.innerHTML = `
    <div class="mav-modal-box">
        <header class="${mavArgs.headerClass}">
            ${mavArgs.header}
        </header>
        <div class="${mavArgs.bodyClass}">
            ${mavArgs.body}
        </div>
        <footer class="${mavArgs.footerClass}">
            ${mavArgs.footer}
        </footer>
    </div>
    <span class="mav-modal-close mav-btn-close" title="Click to close"></span>
    `;
    document.body.appendChild(mavModal);
}

/**
 * Click events on body element
 */

(function mavf_body_click_events(){
    document.body.addEventListener('click',function(e){
        const mavTarget = e.target;
        /**
         * Accordion
         */
        if (mavTarget.classList.contains('mav-accordion-trigger')){
            mavf_accordion(mavTarget);
        }
        /**
         * Close Button
         */
        if (mavTarget.classList.contains('mav-btn-close')){
            mavf_close_btn(mavTarget);
        }
    })
})();