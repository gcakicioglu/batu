<?php require_once('header.php'); ?>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {
    $banner_product_category = $row['banner_product_category'];
}
?>

<?php
if( !isset($_REQUEST['id']) || !isset($_REQUEST['type']) ) {
    header('location: index.php');
    exit;
} else {

    if( ($_REQUEST['type'] != 'top-category') && ($_REQUEST['type'] != 'mid-category') && ($_REQUEST['type'] != 'end-category') ) {
        header('location: index.php');
        exit;
    } else {

        $statement = $pdo->prepare("SELECT * FROM tbl_top_category");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {
            $top[] = $row['tcat_id'];
            $top1[] = $row['tcat_name'];
        }

        $statement = $pdo->prepare("SELECT * FROM tbl_mid_category");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {
            $mid[] = $row['mcat_id'];
            $mid1[] = $row['mcat_name'];
            $mid2[] = $row['tcat_id'];
        }

        $statement = $pdo->prepare("SELECT * FROM tbl_end_category");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {
            $end[] = $row['ecat_id'];
            $end1[] = $row['ecat_name'];
            $end2[] = $row['mcat_id'];
        }

        if($_REQUEST['type'] == 'top-category') {
            if(!in_array($_REQUEST['id'],$top)) {
                header('location: index.php');
                exit;
            } else {

                // Getting Title
                for ($i=0; $i < count($top); $i++) { 
                    if($top[$i] == $_REQUEST['id']) {
                        $title = $top1[$i];
                        break;
                    }
                }
                $arr1 = array();
                $arr2 = array();
                // Find out all ecat ids under this
                for ($i=0; $i < count($mid); $i++) { 
                    if($mid2[$i] == $_REQUEST['id']) {
                        $arr1[] = $mid[$i];
                    }
                }
                for ($j=0; $j < count($arr1); $j++) {
                    for ($i=0; $i < count($end); $i++) { 
                        if($end2[$i] == $arr1[$j]) {
                            $arr2[] = $end[$i];
                        }
                    }   
                }
                $final_ecat_ids = $arr2;
            }   
        }

        if($_REQUEST['type'] == 'mid-category') {
            if(!in_array($_REQUEST['id'],$mid)) {
                header('location: index.php');
                exit;
            } else {
                // Getting Title
                for ($i=0; $i < count($mid); $i++) { 
                    if($mid[$i] == $_REQUEST['id']) {
                        $title = $mid1[$i];
                        break;
                    }
                }
                $arr2 = array();        
                // Find out all ecat ids under this
                for ($i=0; $i < count($end); $i++) { 
                    if($end2[$i] == $_REQUEST['id']) {
                        $arr2[] = $end[$i];
                    }
                }
                $final_ecat_ids = $arr2;
            }
        }

        if($_REQUEST['type'] == 'end-category') {
            if(!in_array($_REQUEST['id'],$end)) {
                header('location: index.php');
                exit;
            } else {
                // Getting Title
                for ($i=0; $i < count($end); $i++) { 
                    if($end[$i] == $_REQUEST['id']) {
                        $title = $end1[$i];
                        break;
                    }
                }
                $final_ecat_ids = array($_REQUEST['id']);
            }
        }
        
    }   
}
?>

<div class="page-banner" style="background-image: url(assets/uploads/<?php echo $banner_product_category; ?>)">
    <div class="inner">
        <h1><?php echo LANG_VALUE_50; ?> <?php echo $title; ?></h1>
    </div>
</div>

<div class="page">
    <div class="container">
	<?php if($title == 'ÇOCUK'): ?>
	<div><div class="featured-categories-widget_desktopContainer__Halsi"><div class="swiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden" style=""><div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px); display: flex;"><div class="swiper-slide featured-categories-widget_swiperSlideDesktop__0OexC swiper-slide-active" style="margin-right: 15.4px;"><div class=""><a target="_self" class="" href="/cocuk-bebek-mont-c-23877919"><img alt="Mont" width="130" height="130" decoding="async" data-nimg="1" src="https://boyner-marketplace-ecom-cms-small-prod.mncdn.com/mnresize/195/-/wp-content/uploads/2024/09/mont_1727346222.jpg" style="color: transparent;"><h5 style="color:black" class="featured-categories-widget_textDesktop__FDMoA">Mont</h5></a></div></div><div class="swiper-slide featured-categories-widget_swiperSlideDesktop__0OexC swiper-slide-next" style="margin-right: 15.4px;"><div class=""><a target="_self" class="" href="/cocuk-bebek-bot-c-23877894"><img alt="Bot" width="130" height="130" decoding="async" data-nimg="1" src="https://boyner-marketplace-ecom-cms-small-prod.mncdn.com/mnresize/195/-/wp-content/uploads/2024/09/bot_1727346206.jpg" style="color: transparent;"><h2 class="featured-categories-widget_textDesktop__FDMoA">Bot</h2></a></div></div><div class="swiper-slide featured-categories-widget_swiperSlideDesktop__0OexC" style="margin-right: 15.4px;"><div class=""><a target="_self" class="" href="/pantolon-c-545"><img alt="Pantolon" width="130" height="130" decoding="async" data-nimg="1" src="https://boyner-marketplace-ecom-cms-small-prod.mncdn.com/mnresize/195/-/wp-content/uploads/2024/09/pantolon__1727346213.jpg" style="color: transparent;"><h2 class="featured-categories-widget_textDesktop__FDMoA">Pantolon</h2></a></div></div><div class="swiper-slide featured-categories-widget_swiperSlideDesktop__0OexC" style="margin-right: 15.4px;"><div class=""><a target="_self" class="" href="/kampanya/cocuk-yilbasi-sweatshirt-c-23894641"><img alt="Sweatshirt" width="130" height="130" decoding="async" data-nimg="1" src="https://boyner-marketplace-ecom-cms-small-prod.mncdn.com/mnresize/195/-/wp-content/uploads/2024/09/sweat_1727346220.jpg" style="color: transparent;"><h2 class="featured-categories-widget_textDesktop__FDMoA">Sweatshirt</h2></a></div></div><div class="swiper-slide featured-categories-widget_swiperSlideDesktop__0OexC" style="margin-right: 15.4px;"><div class=""><a target="_self" class="" href="/esofman-c-43342"><img alt="Eşofman" width="130" height="130" decoding="async" data-nimg="1" src="https://boyner-marketplace-ecom-cms-small-prod.mncdn.com/mnresize/195/-/wp-content/uploads/2024/09/esofman_1727346231.jpg" style="color: transparent;"><h2 class="featured-categories-widget_textDesktop__FDMoA">Eşofman</h2></a></div></div><div class="swiper-slide featured-categories-widget_swiperSlideDesktop__0OexC" style="margin-right: 15.4px;"><div class=""><a target="_self" class="" href="/kampanya/cocuk-sneaker-c-23894642"><img alt="Sneaker" width="130" height="130" decoding="async" data-nimg="1" src="https://boyner-marketplace-ecom-cms-small-prod.mncdn.com/mnresize/195/-/wp-content/uploads/2024/09/spor-ayakkabi_1727346218.jpg" style="color: transparent;"><h2 class="featured-categories-widget_textDesktop__FDMoA">Sneaker</h2></a></div></div><div class="swiper-slide featured-categories-widget_swiperSlideDesktop__0OexC" style="margin-right: 15.4px;"><div class=""><a target="_self" class="" href="/gomlek-bluz-c-553"><img alt="Gömlek" width="130" height="130" decoding="async" data-nimg="1" src="https://boyner-marketplace-ecom-cms-small-prod.mncdn.com/mnresize/195/-/wp-content/uploads/2024/09/gomlek_1727346224.jpg" style="color: transparent;"><h2 class="featured-categories-widget_textDesktop__FDMoA">Gömlek</h2></a></div></div><div class="swiper-slide featured-categories-widget_swiperSlideDesktop__0OexC" style="margin-right: 15.4px;"><div class=""><a target="_self" class="" href="/cocuk-bebek-jean-c-23877906"><img alt="Jean" width="130" height="130" decoding="async" data-nimg="1" src="https://boyner-marketplace-ecom-cms-small-prod.mncdn.com/mnresize/195/-/wp-content/uploads/2024/09/jean_1727346204.jpg" style="color: transparent;"><h2 class="featured-categories-widget_textDesktop__FDMoA">Jean</h2></a></div></div><div class="swiper-slide featured-categories-widget_swiperSlideDesktop__0OexC" style="margin-right: 15.4px;"><div class=""><a target="_self" class="" href="/cocuk-t-shirt-c-3392851"><img alt="T-Shirt" width="130" height="130" decoding="async" data-nimg="1" src="https://boyner-marketplace-ecom-cms-small-prod.mncdn.com/mnresize/195/-/wp-content/uploads/2024/09/t-shirt-2709-cocuk-rev_1727416883.jpg" style="color: transparent;"><h2 class="featured-categories-widget_textDesktop__FDMoA">T-Shirt</h2></a></div></div><div class="swiper-slide featured-categories-widget_swiperSlideDesktop__0OexC" style="margin-right: 15.4px;"><div class=""><a target="_self" class="" href="/cocuk-bebek-elbise-c-23877898"><img alt="Elbise" width="130" height="130" decoding="async" data-nimg="1" src="https://boyner-marketplace-ecom-cms-small-prod.mncdn.com/mnresize/195/-/wp-content/uploads/2024/09/elbise-cocuk-sayfasidur_1727416882.jpg" style="color: transparent;"><h2 class="featured-categories-widget_textDesktop__FDMoA">Elbise</h2></a></div></div></div></div></div></div>
    <?php endif; ?>
	<div class="row">
          <div class="col-md-3">
                <?php require_once('sidebar-category.php'); ?>
            </div>
            <div class="col-md-9">
                
                <h3><?php echo LANG_VALUE_51; ?> "<?php echo $title; ?>"</h3>
                <div class="product product-cat">

                    <div class="row">
                        <?php
                        // Checking if any product is available or not
                        $prod_count = 0;
                        $statement = $pdo->prepare("SELECT * FROM tbl_product");
                        $statement->execute();
                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result as $row) {
                            $prod_table_ecat_ids[] = $row['ecat_id'];
                        }

                        for($ii=0;$ii<count($final_ecat_ids);$ii++):
                            if(in_array($final_ecat_ids[$ii],$prod_table_ecat_ids)) {
                                $prod_count++;
                            }
                        endfor;

                        if($prod_count==0) {
                            echo '<div class="pl_15">'.LANG_VALUE_153.'</div>';
                        } else {
                            for($ii=0;$ii<count($final_ecat_ids);$ii++) {
                                $statement = $pdo->prepare("SELECT * FROM tbl_product WHERE ecat_id=? AND p_is_active=?");
                                $statement->execute(array($final_ecat_ids[$ii],1));
                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($result as $row) {
                                    ?>
                                    <div class="col-md-4 item item-product-cat">
                                        <div class="inner">
                                            <div class="thumb">
                                                <div class="photo" style="background-image:url(assets/uploads/<?php echo $row['p_featured_photo']; ?>);"></div>
                                                <div class="overlay"></div>
                                            </div>
                                            <div class="text">
                                                <h3><a href="product.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['p_name']; ?></a></h3>
                                                <h4>
                                                    <?php echo LANG_VALUE_1; ?><?php echo $row['p_current_price']; ?> 
                                                    <?php if($row['p_old_price'] != ''): ?>
                                                    <del>
                                                        <?php echo LANG_VALUE_1; ?><?php echo $row['p_old_price']; ?>
                                                    </del>
                                                    <?php endif; ?>
                                                </h4>
                                                <div class="rating">
                                                    <?php
                                                    $t_rating = 0;
                                                    $statement1 = $pdo->prepare("SELECT * FROM tbl_rating WHERE p_id=?");
                                                    $statement1->execute(array($row['p_id']));
                                                    $tot_rating = $statement1->rowCount();
                                                    if($tot_rating == 0) {
                                                        $avg_rating = 0;
                                                    } else {
                                                        $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
                                                        foreach ($result1 as $row1) {
                                                            $t_rating = $t_rating + $row1['rating'];
                                                        }
                                                        $avg_rating = $t_rating / $tot_rating;
                                                    }
                                                    ?>
                                                    <?php
                                                    if($avg_rating == 0) {
                                                        echo '';
                                                    }
                                                    elseif($avg_rating == 1.5) {
                                                        echo '
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        ';
                                                    } 
                                                    elseif($avg_rating == 2.5) {
                                                        echo '
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        ';
                                                    }
                                                    elseif($avg_rating == 3.5) {
                                                        echo '
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        ';
                                                    }
                                                    elseif($avg_rating == 4.5) {
                                                        echo '
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                        ';
                                                    }
                                                    else {
                                                        for($i=1;$i<=5;$i++) {
                                                            ?>
                                                            <?php if($i>$avg_rating): ?>
                                                                <i class="fa fa-star-o"></i>
                                                            <?php else: ?>
                                                                <i class="fa fa-star"></i>
                                                            <?php endif; ?>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <?php if($row['p_qty'] == 0): ?>
                                                    <div class="out-of-stock">
                                                        <div class="inner">
                                                            Out Of Stock
                                                        </div>
                                                    </div>
                                                <?php else: ?>
                                                    <p><a href="product.php?id=<?php echo $row['p_id']; ?>"><i class="fa fa-shopping-cart"></i> <?php echo LANG_VALUE_154; ?></a></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>