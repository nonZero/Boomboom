<?php
require 'design_header.php';

/**
 * $jobs->list_of_websites       - array with all websites
 * $jobs->list_of_websites_count - count of the websites in the array
 *     $jobs->list_of_websites[$i]['id_website'] - id of the website
 *     $jobs->list_of_websites[$i]['name']       - name of the website
 *     $jobs->list_of_websites[$i]['checked']    - if the checkbox is checked. 1 - checked. 0 - not checked;
 * 
 * $jobs->list_of_job_types       - array with all job types
 * $jobs->list_of_job_types_count - count of the categories in the array
 *     $jobs->list_of_job_types[$i]['id_job_type'] - id of the job type
 *     $jobs->list_of_job_types[$i]['name']        - name of the job type
 *     $jobs->list_of_job_types[$i]['checked']     - if the checkbox is checked. 1 - checked. 0 - not checked;
 * 
 * $jobs->list_of_categories       - array with all categories
 * $jobs->list_of_categories_count - count of the categories in the array
 *     $jobs->list_of_categories[$i]['id_category'] - id of the categorie
 *     $jobs->list_of_categories[$i]['name']        - name of the categorie
 *     $jobs->list_of_categories[$i]['checked']     - if the checkbox is checked. 1 - checked. 0 - not checked;
 */
?>

<script>
var count_jobs = <?php echo $jobs->jobs_count; ?>
</script>

<div class="container">
<div class="row">

    <div class="span3">
    <form method="POST" action=".">
    <div class="sidebar">
        
            <?php
                    // ### LIST OF JOB TYPES ###
                echo '<div class="well"><ul class="nav nav-list">';
                
                for($i=0;$i<$jobs->list_of_job_types_count;$i++)
                {
                    if($jobs->list_of_job_types[$i]['checked']==1)
                        $checked = ' checked="checked"';
                    else
                        $checked = '';

                    echo '<li><a><label class="checkbox"><input'.$checked.' type="checkbox" name="job_types['
                          .$jobs->list_of_job_types[$i]['id_job_type'].'][]" value="1"> <span class="label label-info">'
                          .$jobs->list_of_job_types[$i]['name'].'</span></label></a></li>';
                }

                echo '</ul></div>';
                
                ?>
                
    <div class="well" align="right">
        <ul class="nav nav-list">
        <li><a><label class="checkbox"><input <?php if($_SESSION['show_hidden_ads']==true) echo 'checked="checked"'; ?> type="checkbox" name="show_hidden_ads" value="1"> <span style="color: #008080;">להראות הודעות בלי אפשרות ישירה ליצור קשר עם המפרסם</span></label></a></li>
        </ul>
    </div>
                <?php
            
                    // ### LIST OF CATEGORIES ###
               if(MOD_CATEGORIES_ON)
               {
                   echo '<div class="well"><ul class="nav nav-list">';
                   
                   for($i=0;$i<$jobs->list_of_categories_count;$i++)
                   {
                       if($jobs->list_of_categories[$i]['checked']==1)
                           $checked = ' checked="checked"';
                       else
                           $checked = '';

                       echo '<li><a><label class="checkbox"><input'.$checked.' type="checkbox" name="categories['.$jobs->list_of_categories[$i]['id_category'].'][]" value="1"> <span style="color: #008080;">'.$jobs->list_of_categories[$i]['name'].'</span></label></a></li>';
                   }
                   
                   echo '</ul></div>';
               }
                
                   // ### LIST OF WEB SITES ###
               echo '<div class="well"><ul class="nav nav-list" dir="ltr">';
               
               for($i=0;$i<$jobs->list_of_websites_count;$i++)
               {
                   
                       // From first hiden website, hide the websites in spoiler 
                   // if($i==$jobs->list_of_websites['first_hiden_website']) In new version showing all the websites
                   /* {
                       ?>
                    
                    <div class="accordion-heading" align="right">
                    <a class="accordion-toggle" data-toggle="collapse" href="#collapseOne">
                  ...עוד אתרים                     
                    </a>
                    </div>
                    <div id="collapseOne" class="accordion-body collapse <?php if(!$jobs->list_of_websites['hide_websites']) echo 'in'; ?>">
                    <h4 align="center">
                        באתרים אלה האפשרות היחידה ליצור קשר היא אך ורק דרכם                    
                        </h4>
                        <br />
                    
                       <?php
                    } */
                   
                   if($jobs->list_of_websites[$i]['checked']==1) $checked = ' checked="checked"';
                   else                                          $checked = '';
                   
                   echo '<li><a><label class="checkbox"><input'.$checked.' type="checkbox" name="websites['
                        .$jobs->list_of_websites[$i]['id_website'].'][]" value="1"> <span style="color: #008080;">'
                        .$jobs->list_of_websites[$i]['name'].'</span> <img align="right" src="design/static/images/favicons/'
                        .$jobs->list_of_websites[$i]['id_website'].'.ico" /></label></a></li>';
               }
            
                    // If there are hiden websites, we have one more div to close
                //if($jobs->list_of_websites['first_hiden_website']!=-1)
                   // echo '</div>';
               
                echo '</ul></div>';
                ?>

    <div class="well" align="center">
        <button class="btn btn-primary" name="update_checkboxes" type="submit">שמור שינויים</button>
    </div>
        <div align="left"><a href="https://github.com/Cayce/Boomboom" target="_blank"><img src="design/static/images/github.png" /></a></div>
            
    </div>

        

    
    </div>
        </form>

    <div class="span9" id="list_jobs">

    <?php
    if(isset($_GET['404']))
    {
        ?>
        <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <p style="margin-bottom: 0;">דף שביקשת לא נמצא</p>
        </div>
        <?php
    }
    ?>
        
    <div class="alert alert-info">
    <p style="margin-bottom: 0;">כל המודעות לפרילנסרים ובוני אתרים מכל האתרים בארץ, במקום אחד.</p>
    </div>

   <?php
    require 'design/design_load_jobs.php';
   ?>

    </div>
 </div>
</div>



<?php
require 'design_bottom.php';
?>
