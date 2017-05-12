<?php
	use net\hdssolutions\php\dbo\DB;

	$pstmt = DB::getConnection()->prepare('SELECT * FROM c2_package WHERE package_id = :package');
	$pstmt->bindValue(':package', $_GET['pid']);
	$pstmt->execute();

	$package = $pstmt->fetch(PDO::FETCH_OBJ);
?><!DOCTYPE html>
<html>
	<head>
		<title>Comdetur Agencia de Viajes | Paquete</title>
	    <?php include_once 'screens/sections/header.php'; ?>
    </head>
    <body>
	    <div id="loader">
	        <div class="centrize">
	            <div class="v-center">
	                <div id="mask">
	                    <span></span><span></span><span></span><span></span><span></span>
	                </div>
	            </div>
	        </div>
	    </div>
	    <header id="topnav">
	        <div class="logo">
	            <a href="."><img src="images/logo.png" alt="" class="logo-light"><img src="images/logo-1.png" alt="" class="logo-dark"></a>
	        </div>
	        <nav>
	            <div class="button">
	                <a class="btn-open" href="#"><span>Menú</span></a>
	            </div>
	        </nav>
            <?php include_once 'screens/sections/menu.php'; ?>
        </header>
	    <section id="empresas" class="trigger-nav pd-0">
	        <div id="frame">
	            <div class="content-frame">
	                <div class="article">
	                    <div class="header">
	                        <div class="categories-overlay"></div>
	                        <div class="content-img" style="background: url(modules/upload/cache/<?php echo $package['package_background']; ?>)"></div>
	                        <div class="content-header">
                                <h1><?php echo $package['package_title']; ?></h1>
	                        </div>
	                    </div>
	                    <div class="article-section <?php //echo strtolower($package->package_category); ?>">
	                        <div class="article-content">
	                            <div class="article-title">
	                                <h3><?php echo $package->package_title; ?></h3>
	                            </div>
	                            <div class="article-text">
	                                <?php echo preg_replace('/\<h4\>/', '</div><div class="article-text"><h4>', $package->package_details); ?>
	                            </div>
                                <div class="article-table">
	                                <div class="price-table-wrapper">
                                        <table>
	                                        <?php
	                                        	$pstmtt = DB::getConnection()->prepare('SELECT * FROM c2_package_prices WHERE price_package = :package ORDER BY price_row, price_col');
	                                        	$pstmtt->bindValue(':package', $_GET['pid']);
	                                        	$pstmtt->execute();
	                                        	$row = 0;
	                                        	$content = '';
	                                        	while (($col = $pstmtt->fetch(PDO::FETCH_OBJ)) !== false) {
	                                        		if ($col->price_row != $row) {
	                                        			echo '<tr>' . $content . '</tr>';
	                                        			$content = '';
	                                        			$row = $col->price_row;
	                                        		}
	                                        		$content .= '<td>'.$col->price_content.'</td>';
	                                        	}
	                                        	echo '<tr>' . $content . '</tr>';
	                                        ?>
                                        </table>
	                                </div>
                                </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>
	    <?php include_once 'screens/sections/footer.php' ?>
    </body>
</html>