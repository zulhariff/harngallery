<div  id="harn_content">
      <ul class="breadcrumb">
        <li>
          <a href="index.php">Home</a><span class="divider">></span>
        </li>
        <li class="active">
          Browse Art
        </li>       
      </ul> 
			<form class="form-horizontal" action="/members/search" id="browse-art-navi">
        <div class="row">
          <div class="span2 browseArtSpan BACol1">
            <div class="control-group">  
              <label class="control-label">Category</label>
              <div class="controls">  
                <select id="ctlCategory">
                  <option value="0">All</option>
                  <?php foreach ($categories as $category) { ?>
                  <option value="<?=$category->id;?>"><?=$category->name;?></option>
                  <?php } ?>
                </select>                           
              </div> 
            </div> 
          </div>
          <div class="span2 browseArtSpan BACol2">
            <div class="control-group">  
                <label class="control-label">Subject</label>
                <div class="controls">  
                    <select id="ctlSubject">
                      <option value="0">All</option>
                    <?php foreach ($subjects as $subject) { ?>
                    <option value="<?=$subject->id;?>"><?=$subject->name;?></option>
                    <?php } ?>
                    </select>          
                </div> 
              </div>    
          </div>
          <div class="span2 browseArtSpan BACol3">       
            <div class="control-group">  
              <label class="control-label">Price</label>
              <div class="controls">                    
                <select id="ctlPrice">
                  <option value="0">Any Price</option>
                  <option value="1">Under $99</option>
                  <option value="2">$100 - $499</option>
                  <option value="3">$500 - $999</option>
                  <option value="4">$1,000 - $2,499</option>
                  <option value="5">More than $2,500</option>
                </select>         
              </div> 
            </div>                          
          </div>       
          <div class="span2">       
            <button class="btnHarn" type="button" id="btnSearchArt">SEARCH ART</button>  
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" id="searchCollapse">
              Advanced Search
            </a>    
          </div>              
        </div>

        <div id="collapseOne" class="panel-collapse collapse">
          <div class="row">
          <div class="span2 browseArtSpan BACol1">
            <div class="control-group">  
              <label class="control-label">Medium</label>
              <div class="controls">  
                <select id="ctlMedium"></select>        
              </div> 
            </div>  
          </div>	
          <div class="span2 browseArtSpan BACol2">
            <div class="control-group">  
                <label class="control-label">Style</label>
                <div class="controls">  
                  <select id="ctlStyle">
                    <option value="0">All</option>
                    <?php foreach ($styles as $style) { ?>
                    <option value="<?=$style->id;?>"><?=$style->name;?></option>
                    <?php } ?>
                  </select>                                   
                </div> 
              </div>    
          </div>
        <div class="span2 browseArtSpan BACol3">             
          <div class="control-group">  
                <label class="control-label">Color</label>
                <div class="controls">  
                  <select id="ctlColor">
                    <option value="0">All</option>
                    <?php foreach ($colors as $color) { ?>
                    <option value="<?=$color->id;?>"><?=$color->name;?></option>
                    <?php } ?>
                  </select>                           
                </div> 
              </div>                          
        </div>   
        </div>
        <div class="row">
        <div class="span2 browseArtSpan BACol1">               
          <div class="control-group">  
                <label class="control-label">Size</label>
                <div class="controls">  
                    <select id="ctlSize">
                      <option value="0">Any Size</option>
                      <option value="1">Small</option>
                      <option value="2">Medium</option>
                      <option value="3">Large</option>
                    </select>
                </div> 
              </div>                          
        </div>            			
				<div class="span2 browseArtSpan BACol2">				  
					<div class="control-group">  
            		<label class="control-label">Orientation</label>
            		<div class="controls">  
              			<select id="ctlOrientation">
              				<option value="0">All</option>
            				<?php foreach ($orientations as $orientation) { ?>
            				<option value="<?=$orientation->id;?>"><?=$orientation->name;?></option>
            				<?php } ?>
              			</select>       
            		</div> 
          		</div>              		        
				</div>	

          <div class="span2 browseArtSpan BACol3">
            <div class="control-group">  
                <label class="control-label">Location</label>
                <div class="controls">  
                    <select id="ctlLocation">
                      <option value="0">Any location</option>
                      <option value="1">--------------------------------</option>
                      <option value="2">Africa</option>
                      <option value="3">America</option>
                      <option value="4">Asia</option>
                      <option value="5">Australia/Ocenia</option>
                      <option value="6">Europe</option>
                      <option value="1">--------------------------------</option>
                    <?php $countries = config_item('address.countries');
                      foreach ($countries as $country_iso => $country){
                        echo "<option value='{$country_iso}'>{$country['printable']}</option>\n";
                      }
                    ?>
                    </select>     
                </div> 
              </div>  
          </div>        
          </div>

				</div>																		
			</form>


	


			<div class="row-fluid">
			<div class="span8">
			<span id="browseArtTitle">All:</span>	
			</div>
			<div class="span4 pull-right">
				<div class="pull-right">
				<?php include 'btnArtworkSort.php';?>
				<span id="outputTotalArtworks"></span> items	
				</div>
			</div>
			</div>		
			<div class="row-fluid">
            <div id="main_content" >
            	                                  
            </div>
		</div>
	</div>				

<script>
	var category=['All','Painting','Photography','Drawing','Printmaking','Assemblage / Collage','Other'];
	var price=['Any Price','Under $99','$100 - $499','$500 - $999','$1,000 - $2,499', 'More than $5,000'];
	var medium=[
		['All'],
		['All','Acrylic','Aerosol Paint','Airbrush','Enamel','Encaustic Wax','Glaze','Gouache','Hot Wax','Household','Ink','Latex Paint','Magna Paint','Mixed Media','Oil','Oil Pastel','Tempera','Watercolor'],
		['All','Black & White','C-type','Color','Digital','Dye Transfer','E-type','Full-spectrum','Gelatin Silver Process','Giclee','Lenticular','Photogram','Pinhole','Polaroid','Ray Pint'],
		['All','Chalk','Charcoal','Colored Pencils','Conte','Crayon','Graphite','Oil Pastel','Pastel','Pen And Ink','Pencil','Silverpoint'],
		['All','Brushes','Collagraph','Copper Etching Plate','Digital Print','Drawing','Drypoint','Engraving','Etching','Foil Imaging','Giclee Print','Glass','Ink','Linocuts','Lithography','Monotype','Painting','Screen-printing','Stencils','Watercolor','Woodcut'],
		['All','Decoupage','Digital','Encaustic','Fabric','Found Objects','Metal','Other','Painting','Paper','Photomontage','Wax','Wood']		
	];	
	
	var style=['All','Abstract','Abstract Expressionism','Art Deco','Cubism','Dada','Expressionism','Impressionism','Pop Art','Realism','Street Art','Surrealism'];
	var subject=['All','Abstract','Animals','Architecture','Business','Cartoon','Children','Cuisine','Education','Erotic','Fantasy','Fashion','Figures & Nudes','Food & Drink','Health','Humor','Love','Nature','People','Places','Political','Celebrity','Religious','Science','Sports','Transportation','Travel'];
	var _location=['Any location','Africa','America','Asia','Australia/Ocenia','Europe','Other'];
	
	var orientation=['All','Landscape','Portrait','Square'];
	var size=['Any Size','Small','Medium','Large'];
	var color=['All','Beige','Black','Blue','Brown','Dark blue','Dark green','Dark red','Green','Grey','Orange','Pink','Purple','Red','Turquiose','Violet','White','Yellow'];
	var sortby=['Sort by','Most recent','Price: low to high','Price: hight to low','Size: small to large','Size: large to small'];
	
	


	function addArrToDDL($obj,arr){
		$obj.empty();
		$.each(arr, function(val,key) {				
			$obj.append($('<option value='+val+'>'+key+'</option>'))
		});
	}
</script>	
<?php

?>