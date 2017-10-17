<style>
  .hovereffect {
  width:100%;
  height:100%;
  float:left;
  overflow:hidden;
  position:relative;
  text-align:center;
  cursor:default;
  }

  .hovereffect .overlay {
  width:100%;
  height:100%;
  position:absolute;
  overflow:hidden;
  top:0;
  left:0;
  opacity:0;
  background-color:rgba(0,0,0,0.5);
  -webkit-transition:all .4s ease-in-out;
  transition:all .4s ease-in-out
  }

  .hovereffect img {
  display:block;
  position:relative;
  -webkit-transition:all .4s linear;
  transition:all .4s linear;
  }

  .hovereffect h2 {
  text-transform:uppercase;
  color:#fff;
  text-align:center;
  position:relative;
  font-size:17px;
  background:rgba(0,0,0,0.6);
  -webkit-transform:translatey(-100px);
  -ms-transform:translatey(-100px);
  transform:translatey(-100px);
  -webkit-transition:all .2s ease-in-out;
  transition:all .2s ease-in-out;
  padding:10px;
  }

  .hovereffect a.info {
  text-decoration:none;
  display:inline-block;
  text-transform:uppercase;
  color:#fff;
  border:1px solid #fff;
  background-color:transparent;
  opacity:0;
  filter:alpha(opacity=0);
  -webkit-transition:all .2s ease-in-out;
  transition:all .2s ease-in-out;
  margin:50px 0 0;
  padding:7px 14px;
  }

  .hovereffect a.info:hover {
  box-shadow:0 0 5px #fff;
  }

  .hovereffect:hover img {
  -ms-transform:scale(1.2);
  -webkit-transform:scale(1.2);
  transform:scale(1.2);
  }

  .hovereffect:hover .overlay {
  opacity:1;
  filter:alpha(opacity=100);
  }

  .hovereffect:hover h2,.hovereffect:hover a.info {
  opacity:1;
  filter:alpha(opacity=100);
  -ms-transform:translatey(0);
  -webkit-transform:translatey(0);
  transform:translatey(0);
  }

  .hovereffect:hover a.info {
  -webkit-transition-delay:.2s;
  transition-delay:.2s;
  }
</style>

<hr />

<div class="row">
  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
    <div class="hovereffect">
        <img class="img-responsive" src="assets/frontend/default/default.png" alt="">
        <div class="overlay">
           <h2>Default Theme</h2>
           <a class="info" href="#">
             <i class="fa fa-check"></i> &nbsp; <?php echo get_phrase('active'); ?>
           </a>
        </div>
    </div>
</div>
<div class="col-sm-3">

		<div class="tile-stats tile-aqua">
			<div class="icon"><i class="entypo-palette"></i></div>
			<h3>New Themes are Coming Soon...</h3>
		</div>

	</div>
</div>
