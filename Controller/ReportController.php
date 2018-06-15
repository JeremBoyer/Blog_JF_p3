<?php
use Blog\Model\ReportManager;

require_once 'Model/ReportManager.php';

function report($commentId, $userId)
{

    $reportManager = new ReportManager();
    $report = $reportManager->report($commentId, $userId);

    $postReport = $reportManager->getPostReport($commentId);

    header('Location: index.php?action=post&id=' . $postReport['post_id_fk']);

}