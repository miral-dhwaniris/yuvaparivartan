<?php 


function dropdownSectorEmployer()
{
    return [
    'Agriculture',
    'Automobile',
    'Banking',
    'BPO',
    'Education',
    'Electronics',
    'Engineering',
    'Exports & Imports',
    'Financial Services',
    'FMCG',
    'Healthcare',
    'Human Resources',
    'Infrastructure',
    'Insurance',
    'ITES',
    'Logistics',
    'Marketing',
    'Media & Entertainment',
    'Multi-Sector',
    'Others',
    'QSR',
    'Research & Development',
    'Retail',
    'Social Development',
    ];
}

function dropdownCandidateSelected()
{
    return [
            'Not Slected',
            'Kept in Pending',
            'Selected'
        ];
}
function dropdownCandidateSelectedPositiveValue()
{
    return 'Selected';
}


function dropdownCandidateJoined()
{
    return [
            'Not Joined',
            'Joined'
        ];
}
function dropdownCandidateJoinedPositiveValue()
{
    return 'Joined';
}

function jobOfferStatusDropdown()
{
    return [
            'Active',
            'Closed',
        ];
}

function dropdownCandidateFollowupStatus()
{
    return [
            'Continuing in same job',
            'Left job - looking for new',
            'Left job - not interested in job',
            'Switched company',
        ];
}


function dropdownCandidateGraduationStatus()
{
    return [
            'Under Training',
            'Dropout',
            'Graduate',
        ];
}
function dropdownCandidateGraduationStatusPositiveValue()
{
    return 'Graduate';
}



function dropdownCandidatePlaced()
{
    return [
            'To be placed',
            'Gone for further studies',
            'Others',
            'Placed'
        ];
}
function dropdownCandidatePlacedPositiveValue()
{
    return 'Placed';
}

function staffJobROleDropdown()
{
    return [
            'Trainer', 'Mobilizer', 'Placement','Coordinator'
         ];
}
function staffJobROleDropdownActive()
{
    return 'Placement';
}

function batchStatusDropdown()
{
    return ['Started','Completed'];
}
function batchStatusDropdownCreateTime()
{
    return ['Started'];
}
function batchStatusDropdownStarted()
{
    return 'Started';
}
function batchStatusDropdownCompleted()
{
    return 'Completed';
}

?>