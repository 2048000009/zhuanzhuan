////动态设置缩放比例
var initScale = 1 / window.devicePixelRatio;
document.write('<meta name="viewport" content="width=device-width,user-scalable=no,initial-scale='+ initScale +',minimum-scale='+ initScale +',maximum-scale='+ initScale +'">')
////动态设置html字体大小
var initWidth = window.document.documentElement.clientWidth;
document.getElementsByTagName('html')[0].style.fontSize = initWidth / 16 + 'px';
