<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "camp".
 *
 * @property integer $id
 * @property string $name
 * @property string $state
 * @property string $district
 * @property string $block
 * @property string $village
 * @property string $camp_code
 * @property string $camp_start_date
 * @property string $tentative_end_date
 * @property string $actual_end_date
 * @property string $camp_status
 * @property string $no_of_enrollment
 * @property string $camp_facilitator
 * @property string $camp_facilitator_date
 * @property string $area_manager
 * @property string $camp_coordinator
 * @property string $camp_leader
 * @property string $camp_leader_date
 * @property string $camp_leader_induction_provided
 * @property string $number_of_forms_filled
 * @property string $certificate_requisition
 * @property string $amount_of_voucher
 * @property string $voucher_images
 * @property string $amount_of_fees_collected
 * @property string $name_of_person_holding_the_amount
 * @property string $name_of_person_holding_the_amount_phone_number
 * @property string $amount_of_fees_deposited
 * @property string $venue_details
 * @property string $rent_for_camp
 * @property string $infrastructure_images
 * @property string $course
 * @property string $timestamp
 * @property string $upload_status
 */
class Camp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'camp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['name', 'state', 'district', 'block', 'village', 'camp_code', 'camp_start_date', 'tentative_end_date', 'actual_end_date', 'camp_status', 'no_of_enrollment', 'camp_facilitator', 'camp_facilitator_date', 'area_manager', 'camp_coordinator', 'camp_leader', 'camp_leader_date', 'camp_leader_induction_provided', 'number_of_forms_filled', 'certificate_requisition', 'amount_of_voucher', 'voucher_images', 'amount_of_fees_collected', 'name_of_person_holding_the_amount', 'name_of_person_holding_the_amount_phone_number', 'amount_of_fees_deposited', 'venue_details', 'rent_for_camp', 'infrastructure_images', 'course', 'timestamp', 'upload_status'], 'required'],
//            [['camp_facilitator_date', 'camp_leader_date'], 'safe'],
//            [['voucher_images', 'infrastructure_images'], 'string'],
            [['voucher_images', 'infrastructure_images','camp_facilitator_date', 'camp_leader_date','name', 'state', 'district', 'block', 'village', 'camp_code', 'camp_start_date', 'tentative_end_date', 'actual_end_date', 'camp_status', 'no_of_enrollment', 'camp_facilitator', 'area_manager', 'camp_coordinator', 'camp_leader', 'camp_leader_induction_provided', 'number_of_forms_filled', 'certificate_requisition', 'amount_of_voucher', 'amount_of_fees_collected', 'name_of_person_holding_the_amount', 'name_of_person_holding_the_amount_phone_number', 'amount_of_fees_deposited', 'venue_details', 'rent_for_camp', 'course', 'timestamp', 'upload_status'], 'safe']
        ];
    }
    
    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'state' => 'State',
            'district' => 'District',
            'block' => 'Block',
            'village' => 'Village',
            'camp_code' => 'Camp Code',
            'camp_start_date' => 'Camp Start Date',
            'tentative_end_date' => 'Tentative End Date',
            'actual_end_date' => 'Actual End Date',
            'camp_status' => 'Camp Status',
            'no_of_enrollment' => 'No Of Enrollment',
            'camp_facilitator' => 'Camp Facilitator',
            'camp_facilitator_date' => 'Camp Facilitator Date',
            'area_manager' => 'Area Manager',
            'camp_coordinator' => 'Camp Coordinator',
            'camp_leader' => 'Camp Leader',
            'camp_leader_date' => 'Camp Leader Date',
            'camp_leader_induction_provided' => 'Camp Leader Induction Provided',
            'number_of_forms_filled' => 'Number Of Forms Filled',
            'certificate_requisition' => 'Certificate Requisition',
            'amount_of_voucher' => 'Amount Of Voucher',
            'voucher_images' => 'Voucher Images',
            'amount_of_fees_collected' => 'Amount Of Fees Collected',
            'name_of_person_holding_the_amount' => 'Name Of Person Holding The Amount',
            'name_of_person_holding_the_amount_phone_number' => 'Name Of Person Holding The Amount Phone Number',
            'amount_of_fees_deposited' => 'Amount Of Fees Deposited',
            'venue_details' => 'Venue Details',
            'rent_for_camp' => 'Rent For Camp',
            'infrastructure_images' => 'Infrastructure Images',
            'course' => 'Course',
            'timestamp' => 'Timestamp',
            'upload_status' => 'Upload Status',
        ];
    }
}
