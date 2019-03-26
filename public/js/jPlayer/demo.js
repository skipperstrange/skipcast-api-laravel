 var myPlaylist = new jPlayerPlaylist({
     jPlayer: "#jplayer_N",
     cssSelectorAncestor: "#jp_container_N"
 }, [{

         title: "Dont Keep Me waiting",
         artist: "Kwasi Arthur ft KiDi",
         mp3: "http://localhost:8080/resources/audio/Kwesi-Arthur-Dont-Keep-Me-Waiting-ft.-Kidi.mp3",
         poster: "images/m0.jpg"
     },
     {
         title: "White Iverson",
         artist: "Post Malone",
         mp3: "http://localhost:8080/resources/audio/track4.mp3",
         poster: "images/m0.jpg"
     },
     {
         title: "One Kiss",
         artist: "Dua Lipa ft Calvin Harris",
         mp3: "http://localhost:8080/resources/audio/Dua Lipa, Calvin Harris - One Kiss (DawnFoxes.com).mp3",
         poster: "images/m0.jpg"
     },
     {
         title: "Lean On",
         artist: "3studios",
         mp3: "http://localhost:8080/resources/audio/track1.mp3",
         poster: "images/m0.jpg"
     },
     {
         title: "One Dance",
         artist: "Wizkid Drake",
         mp3: "http://localhost:8080/resources/audio/track2.mp3",
         poster: "images/m0.jpg"
     },
     {
         title: "What You Came For",
         artist: "Calvin Haris ft Rihanna",
         mp3: "http://localhost:8080/resources/audio/Calvin_Harris_feat._Rihanna_-_This_Is_What_You_Came_For_(mp3.pm).mp3",
         poster: "images/m0.jpg"
     },
     {
         title: "Cryptic Psyche",
         artist: "ADG3",
         mp3: "http://localhost:8080/resources/audio/trak.mp3",
         poster: "images/m0.jpg"
     },
     {
         title: "Electro Freak",
         artist: "Studios",
         mp3: "http://localhost:8080/resources/audio/track6.mp3",
         poster: "images/m0.jpg"
     },
     {
         title: "Freeform",
         artist: "ADG",
         mp3: "http://localhost:8080/resources/audio/track5.mp3",
         poster: "images/m0.jpg"
     }
 ], {
     playlistOptions: {
         enableRemoveControls: true,
         autoPlay: false
     },
     swfPath: "js/jPlayer",
     supplied: "webmv, ogv, m4v, oga, mp3",
     smoothPlayBar: true,
     keyEnabled: true,
     audioFullScreen: false,
     volume: ".3"
 });

 $(document).on($.jPlayer.event.pause, myPlaylist.cssSelector.jPlayer, function() {
     $('.musicbar').removeClass('animate');
     $('.jp-play-me').removeClass('active');
     $('.jp-play-me').parent('li').removeClass('active');
 });

 $(document).on($.jPlayer.event.play, myPlaylist.cssSelector.jPlayer, function() {
     $('.musicbar').addClass('animate');
 });

 $(document).on('click', '.jp-play-me', function(e) {
     e && e.preventDefault();
     var $this = $(e.target);
     if (!$this.is('a')) $this = $this.closest('a');

     $('.jp-play-me').not($this).removeClass('active');
     $('.jp-play-me').parent('li').not($this.parent('li')).removeClass('active');

     $this.toggleClass('active');
     $this.parent('li').toggleClass('active');
     if (!$this.hasClass('active')) {
         myPlaylist.pause();
     } else {
         var i = Math.floor(Math.random() * (1 + 7 - 1));
         myPlaylist.play(i);
     }

 });



 // video

 $("#jplayer_1").jPlayer({
     ready: function() {
         $(this).jPlayer("setMedia", {
             title: "Big Buck Bunny",
             m4v: "http://flatfull.com/themes/assets/video/big_buck_bunny_trailer.m4v",
             ogv: "http://flatfull.com/themes/assets/video/big_buck_bunny_trailer.ogv",
             webmv: "http://flatfull.com/themes/assets/video/big_buck_bunny_trailer.webm",
             poster: "images/m41.jpg"
         });
     },
     swfPath: "js",
     supplied: "webmv, ogv, m4v",
     size: {
         width: "100%",
         height: "auto",
         cssClass: "jp-video-360p"
     },
     globalVolume: true,
     smoothPlayBar: true,
     keyEnabled: true
 });