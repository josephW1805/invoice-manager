<?php 
    require "header.php";
    require "data.php";
    $myCurrentPage = $status;
    
    $peding = "text-primary";
    $draft = "text-primary";
    $paid = "text-primary";
    $all = "text-primary";

    switch ($status)
    {
        case "pending":
            $peding = "active";
            break;
        case "draft":
            $draft = "active";
            break;
        case "paid":
            $paid = "active";
            break;
        default:
            $all = "active";
            break;
    }
?>
        <div class="p-2">
            <ul class="list-group list-group-horizontal-sm">
                
                <li class="list-group-item {$draft}">
                <a href="?status=<?php echo $statuses[1]; ?>" class="nav-link text-dark"><?php echo ucfirst($statuses[1]); ?></a>
                </li>
                <li class="list-group-item {$peding}">
                <a href="?status=<?php echo $statuses[2]; ?>" class="nav-link text-dark"><?php echo ucfirst($statuses[2]); ?></a>
                </li>
                <li class="list-group-item {$paid}">
                <a href="?status=<?php echo $statuses[3]; ?>" class="nav-link text-dark"><?php echo ucfirst($statuses[3]); ?></a>
                </li>
                <li class="list-group-item {$all}">
                <a href="?status=<?php echo $statuses[0]; ?>" class="nav-link text-dark"><?php echo ucfirst($statuses[0]); ?></a>
                </li>
            </ul>
        </div>
<?php
    require "pagebody.php";
?>