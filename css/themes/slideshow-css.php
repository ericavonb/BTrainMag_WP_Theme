
/* ========================================================================= */
/*                Style for pages with a slideshow, ie home                  */
/* ========================================================================= */

header {
  z-index: 100;
}
/*container for top of content, slideshow*/
#top {
    width: 100%;
    overflow: hidden;
    position: relative;
    margin: 0px 0px 0px 0px;
    height: 570px;
}

#logo, h1#logo {
    position: relative;
    width: 100%;
    text-align: center;
    overflow: hidden;
}
#logo a {
    line-height: 115px;
    font-size: 115px;
}
.menu_right {
    width: 100%;
    position: relative;
    background-color: rgba(255,255,255, 0.9);
}
.menu-main-menu-container {
    margin: 0 auto;
    width: 1040px;
    overflow: visible;
    position: relative;
}
.sf-menu {
    position: absolute;
    left: 0px;
    top: 0px;
}
.sf-menu li a {
    color: #000;
    padding: 3px 18px 0px 18px;
    font-size: 20px;
}
.main_container {
  width: 1120px;
  margin: 0px auto;
  position:relative;
  padding: 20px 10px;
}

/*Slideshow main container*/
.slideshow {
    width: 950px;
    height: 400px;
    padding: 0px;
    margin: 0px auto 0px auto;
    
    position: relative;
    
}
/* Left side of slideshow: holds previous button */
#left {
  display: block;
  position: absolute;
  left: 0px;
  top: 0px;
  background-color: rgba(200, 200, 200, 0.3);
  width: 100px;
  height: 400px;
  z-index: 100;
}
/*background-image: url('http://localhost:8888/wp-content/uploads/2013/02/pattern.png');*/
#center {
  width: 950px;
  height: 400px;
  z-index: 10;
  position: relative;
  
}

/* Right side of slideshow: holds next button */
#right {
  display: block;
  position: absolute;
  right: 0px;
  top: 0px;
  background-color: rgba(255, 255, 255, 0.3);
  width: 100px;
  height: 400px;
  z-index: 100;
}

#below {
  height:170px;
  width: 100%;
  clear: left;
  background-color: rgba(255, 255, 255, 0.9);
  z-index: 120;
  -webkit-box-shadow:  0px 0px 5px 1px rgba(0, 0, 0, .5);
  box-shadow:  0px 0px 5px 1px rgba(0, 0, 0, .5);
}

.slideshow-about {
  margin: 10px auto;
  width: 1120px;
  list-style: none;
  position: relative;
  height:180px;
  padding: 0px;
}
.post-date, .byline, .comments {
  float: left;
  margin-right: 20px;
}




/*List of Slides*/
ul.slides {
    list-style: none;
    margin: 0px;
    padding: 0px;
    width: 950px;
    height: 400px;
}

/*The slides*/
.slide-img {
    float: left;
    width: 950px;
    height: 400px;
    position: relative;
    margin: 0px;
    left: 0px;
    background-color: rgba(255, 255, 255, 0.9);
    

}

.slideshow-image-container, a.slideshow-image-container {
  background-size: 100% auto;
  width: 950px;
  height: 400px;
  background-position: center top;
  display: block;
}

/*slide link, title*/
.slide a {
    line-height: 120%;
    text-decoration: none;
    border: none;
    font-weight: bold;
    font-family: Helvetica, Arial, sans-serif;
    
    text-transform: none;
}

.slide:nth-child(3n + 1) a:hover {
  color: rgba(224, 55, 138, 1.0);
}

.slide:nth-child(3n + 2) a:hover {
  color: rgba(63, 171, 250, 1.0);
}

.slide:nth-child(3n) a:hover {
  color: rgba(255, 233, 40, 1.0);
}

.slide a:hover {
    color: #FFF;
    border: none;
}

/*Slideshow buttons*/

#slideshow-buttons {
  display: block;
}

/* Previous and Next buttons*/

#prev-slide {
  display: block;
  margin: 0px;
  padding: 0px;
  border: none;
  width: 100px;
  height:400px;
  background: none;
  background-image: url('/wp-content/themes/magazine/images/arrow-left.png');
  background-position: center center;
  background-repeat: no-repeat;
  background-size: 20px 50px;

}


#next-slide {
  
  display: block;
  margin: 0px;
  padding: 0px;
  border: none;
  width: 100px;
  height: 0px;
  background: none;
  background-image: url('/wp-content/themes/magazine/images/arrow-right.png');
  background-position: center center;
  background-repeat: no-repeat;
  background-size: 20px 50px;
}

/*Placeholder buttons*/
ul.slide-nav {
    left: 0px;
    bottom: 0px;
    list-style: none;
    width: 1120px;
    margin: 0px auto 0px auto;
    padding: 0px;
    height: 10px;
    background: none;

}
/*placeholder item*/
li.slide-nav-item {
  float: left;
    margin: 0px;
    padding: 0px;
    height: 10px;
    width: 224px;
    position: relative;
    
}
/*actual placeholder button*/
.slide-nav-button {
  position: absolute;
  left: 0px;
  top: 0px;
    width: 100%;
    height: 100%;
    padding: 0px;
    border: none;
    border-radius: 0px;
    border-left: 1px solid #ddd;
    background-color: rgba(255,255, 255 ,0.7);

}
.slide-nav li.selected button {
  background: none;
}
/*.slide-nav-item:nth-child(3n + 2) button {
    background-color: rgba(220, 220, 220, 1.0);
}
.slide-nav-item:nth-child(3n + 1) button {
    background-color: rgba(200, 200, 200, 1.0);
}

.slide-nav-item:nth-child(3n) button {
    background-color: rgba(170, 170, 170, 1.0);
}
*/
.slide-nav-item:nth-child(3n + 1) {
    background-color: rgba(224, 55, 138, 1.0);
}
.slide-nav-item:nth-child(3n + 2) {
    background-color: rgba(63, 171, 250, 1.0);
}
.slide-nav-item:nth-child(3n) {
    background-color: rgba(255, 233, 40, 1.0);
}

.slide-nav-button:hover {
    background: none;
}


.category-container {
  height: 770px;
  border-top: 1px solid black;
  width: 368px;
  padding: 0px 0px 0px 0px;
  margin: 0px 0px 40px 0px;
  float: left;
  font-size: 13px;
  border-style: solid;
  border-width: 0px 2px 0px 0px;
  -moz-border-image: url('/wp-content/themes/magazine//images/border.png') 0 2 0 2 repeat;
  -webkit-border-image: url('/wp-content/themes/magazine/images/border.png') 0 2 0 2 repeat;
  -o-border-image: url('/wp-content/themes/magazine/images/border.png') 0 2 0 2 repeat;
  border-image: url('/wp-content/themes/magazine/images/border.png') 0 2 0 2 repeat;
}
.category-container:nth-child(3n + 1) {
  clear: left;
    border-style: solid;
    border-width: 0px 2px 0px 2px;
    -moz-border-image: url('/wp-content/themes/magazine/images/border.png') 0 2 0 2 repeat;
    -webkit-border-image: url('/wp-content/themes/magazine/images/border.png') 0 2 0 2 repeat;
    -o-border-image: url('/wp-content/themes/magazine/images/border.png') 0 2 0 2 repeat;
    border-image: url('/wp-content/themes/magazine/images/border.png') 0 2 0 2 repeat;
  }
.category-container h1 {
  padding: 10px 0px;
  margin: 0px 5px;
  border-top: 3px solid black;
  text-transform: uppercase;
  font-family: 'Anton', Helvetica, Arial, "Lucida Grande", sans-serif;
  height: 30px;
  line-height: 30px;
  position: relative;
  
}
.category-container h1 a {
  padding: 0;
  margin: 0;
  border: none;
  height: 30px;
  line-height: 30px;
}

.category-container .post {
  line-height: 180%;
  padding: 30px 3px 10px 3px;
  margin: 0px 22px 5px 22px;
  position: relative;
  width: 300px;
  border-bottom: 1px dotted rgba(0,0,0, 0.4);
  font-size: 12px;
  height: 315px;
  color: rgba(0,0,0,0.8);
}
.category-container .post:nth-child(2n + 1) {
  margin-bottom: 0px;
}

.category-container h2 {
  border: none;
  margin: 0px 0px 10px 0px;
  padding: 0px 0px 0px 0px;
  display: block;
  top: 0px;
  left: 0px;
  height: 42px;
  position: relative;
}
.category-container h2 a {
  position: absolute;
  left: 0px;
  bottom: 0px;
}


.category-container .entry-meta {
  height: 40px;
  margin: 20px 0px 0px 0px;
  padding: 0px;
  display: block;
  bottom: 0px;
  
}

.entry-excerpt {
  margin: 0px 2px;
  padding: 0px 0px 0px 0px;
  display: block;
  bottom: 0px;
  
  height: 200px;
}

.thumbnail-image, a.thumbnail-image {
  height: 200px;
  width: 300px;
  margin: 0px;
  display: block;
}


.social-links {
  position: absolute;
  top: 0px;
  right: 0px;
  margin: 0px;
  padding: 0px;
}

#aside {
    position: absolute;
    top: -718px;
    left: 3px;
    margin: 0px;
    padding: 0px;
    z-index: 200;
    width: 150px;
  }
  
#search-5 form {
  background-color: rgba(255,255,255,0.2);
  border: none;
  border-radius: 0;
  box-shadow: none;
}
#search-5 #searchform #searchsubmit {
  background-image: url('/wp-content/themes/magazine/images/icons/search32.png');
  height: 20px;
  width: 20px;
  background-size: 100% auto; 
}
#search-5 #searchform input:focus  {

  color: rgba(224, 55, 138, 1.0);
}
