

/* Index Menu Mechanism */

var page_aboutus = document.getElementById('about');
var page_careers = document.getElementById('career');
var page_reviews = document.getElementById('review');
var page_signin = document.getElementById('signin');
var page_forget = document.getElementById('forget');
var currentPage = '';

var icon_reg = document.getElementById('reg_icon');
var icon_login = document.getElementById('login_icon');
var scene_reg = document.getElementById('reg_tab');
var scene_login = document.getElementById('login_tab');

var curr_icon = '';
var curr_tab = '';

function ChangePage(showpage){
  page_aboutus.className = 'container state-hidden';
  page_careers.className = 'container state-hidden';
  page_reviews.className = 'container state-hidden';
  page_signin.className = 'container state-hidden';
  page_forget.className = 'container state-hidden';

  currentPage = document.getElementById(showpage);
  currentPage.className = 'container state-active';
}
/* ----------------------------------------------------------- */

/* In Page Button Clicks */

function ChangeOnEvent(icon, scene){
  icon_reg.className = 'nav-link';
  icon_login.className = 'nav-link';
  scene_reg.className = 'tab-pane';
  scene_login.className = 'tab-pane';

  curr_icon = document.getElementById(icon);
  curr_tab = document.getElementById(scene);
  curr_icon.className = 'nav-link active';
  curr_tab.className = 'tab-pane active';
}
