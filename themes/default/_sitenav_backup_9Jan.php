
<div id="harn_header">
    <div class="row-fluid" id="logo">
        <div class="span4">
            <a href="<?php echo base_url(); ?>"><img alt="140x140" src="/assets/images/logo.png"></a>
        </div>
        <div class="span8">
            <ul id="top-menu">
                <li><span class="icon-shopping-cart"></span> <a href="/members/cart/">Cart</a></li>
                <?php if($this->session->userdata('members_loggedin')) : ?>
                     <li>
                        <a href="/members/">My Account</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" id="LogoutButton" data-toggle="modal">Logout</a> 
                    </li>
                <?php else: ?>
                    <li><a href="#RegisterModal" role="button" data-toggle="modal">Register</a> or <a href="#LoginModal" role="button" data-toggle="modal">Login</a></li>
                <?php endif; ?>
                <li><span class="icon-question-sign"></span> <a href="/how-it-works">Help</a></li>            
                <li>Artist: 
                    <?php if($this->session->userdata('members_loggedin')) : ?>
                    <a href='/members/'>
                <?php else: ?>
                    <a href="#LoginModal" role="button" data-toggle="modal">
                <?php endif; ?>
                Sell / Upload</a></li>           
            </ul>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span8" id="harn_menu">
            <div class="navbar navbar-inverse navbar-static-top">
                <div class="navbar-inner">
                                
                    <div class="container-fluid">
                    
                         <a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a> 
                         
                        <div class="nav-collapse collapse navbar-responsive-collapse">
                            <ul class="nav">
                                <li>
                                    <a href="/browse-art">BROWSE ART</a>
                                </li>
                                <li class="divider-slash"></li>                     
                                <li>
                                    <a href="/new-this-week">NEW THIS WEEK</a>
                                </li>
                                <li class="divider-slash"></li>         
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">COLLECTIONS
                                    </a>
                                    <ul class="dropdown-menu2">
                                        <li>
                                            <a href="/under-500">UNDER $500</a>
                                        </li>
                                        <li class="ds-level2 divider-slash"></li>       
                                        <li>
                                            <a href="/staff-favorites">STAFF FAVORITES</a>
                                        </li>
                                        <li class="ds-level2 divider-slash"></li>           
                                        <li>
                                            <a href="/most-popular">MOST POPULAR</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="divider-slash"></li>         
                                <li>
                                    <a href="/invest-in-art">INVEST IN ART</a>
                                </li>
                                <li class="divider-slash"></li>             
                                <li>
                                    <a href="/commissions">COMMISSIONS</a>                                    
                                </li>                               
                            </ul>
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
        </div>
        <div class="span4" id="searchbar">
            <form class="navbar-search pull-right" style="width:100px" id="searchForm">
                <div class="btn-group pull-right">          
                <input class="input-medium search-query" type="text" placeholder="Search for..." id="txtSearch" name="txtSearch"> 
                <button type="button" id="btnSearchArtwork" class="btnHarn_search"><i class="icon-search icon-white"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>