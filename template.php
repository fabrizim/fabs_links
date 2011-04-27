<?php
function fabs_links_page($opts=array())
{
    $cols = 2;
    extract( $opts );
    ?>
    <div class="fabs_links_page">
    <?php
    $cats = get_terms('link_category', array('orderby' => 'name', 'order' => 'ASC', 'hierarchical' => 0));
    $count=0;
    foreach( $cats as &$cat ){
        $cat->links = get_bookmarks(array('orderby'=>'name','category'=>$cat->term_id));
    }
    usort( $cats, 'fabs_links_sort_by_count');
    $i=0;
    foreach($cats as $cat){
        $links = $cat->links;
        $classes = array("fabs_links_category");
        $classes[] = 'fabs_links_col fabs_links_col-'.($i++%$cols);
        ?>
        <div class="<?php echo implode(' ',$classes); ?>">
            <h4 class="fabs_links_title"><?php echo $cat->name; ?></h4>
            <div class="fabs_links_links">
                <ul>
                    <?php foreach( $links as $link ){ ?>
                    <li>
                        <a class="fabs_links_link" href="<?= $link->link_url ?>" target="<?= $link->link_target ?>"><?= $link->link_name ?></a>
                        <?php if( $link->link_description ) { ?>
                        <div class="fabs_links_link_description">
                        <?= $link->link_description ?>
                        </div>
                        <?php } ?>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <?php
    }
    ?>
    </div>
    <?php
}

function fabs_links_sort_by_count( $a, $b ){
    
    return count($b->links) - count($a->links);
}