    <?php
    if($bs_dtime >= 12.00)
    {
        if((int)$bs_dtime == 12)
        {
    ?>
            <td rowspan="2">  <?php echo number_format($bs_dtime_format,2, ':', '')  ?> PM</td>
    <?php
        }
        else
        {
            (float)$bs_dtime_format = $bs_dtime - 12.00;
    ?>
            <td rowspan="2">  <?php echo number_format((float)$bs_dtime_format,2, ':', '')  ?> PM</td>
    <?php
        }
        
    }
    else 
    {
    ?>
        <td rowspan="2">  <?php echo number_format((float)$bs_dtime_format,2, ':', '')  ?> AM</td>
    <?php
    }
    ?>

    <td rowspan="2">  <?php echo $bs_boarding ?></td>
    <td rowspan="2">  <?php echo $bs_duration ?></td>

