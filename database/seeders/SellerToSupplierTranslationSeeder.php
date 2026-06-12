<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Translation;
use Illuminate\Support\Facades\Cache;

class SellerToSupplierTranslationSeeder extends Seeder
{
    /**
     * Seed the translations table to remap "Seller" → "Supplier" in all user-facing text.
     *
     * This seeder pre-populates the English translations so that all translate() calls
     * that reference "Seller" or "seller" will display "Supplier" or "supplier" instead.
     * Internal code identifiers (routes, variables, columns) remain unchanged.
     *
     * Run: php artisan db:seed --class=SellerToSupplierTranslationSeeder
     */
    public function run(): void
    {
        $mappings = [
            // Single words
            'Seller' => 'Supplier',
            'Sellers' => 'Suppliers',
            'seller' => 'supplier',
            'sellers' => 'suppliers',

            // Registration & Auth
            'Become a Seller !' => 'Become a Supplier !',
            'Become a Seller' => 'Become a Supplier',
            'Become A Seller' => 'Become A Supplier',
            'Login to Seller' => 'Login to Supplier',
            'Login to Seller Panel' => 'Login to Supplier Panel',
            'Login To Your Seller Account' => 'Login To Your Supplier Account',
            'Seller Login' => 'Supplier Login',
            'Seller Registration Verification' => 'Supplier Registration Verification',
            'Seller Register Page Image' => 'Supplier Register Page Image',
            'Seller Login Page Image' => 'Supplier Login Page Image',
            'Add New Seller' => 'Add New Supplier',
            'Seller Account' => 'Supplier Account',

            // Approval & Verification
            'Seller Verification' => 'Supplier Verification',
            'Seller Verification Form' => 'Supplier Verification Form',
            'Verified seller' => 'Verified supplier',
            'verified seller' => 'verified supplier',
            'Non verified seller' => 'Non verified supplier',
            'Non-Verified seller' => 'Non-Verified supplier',
            'Approved Sellers' => 'Approved Suppliers',
            'Unverified Sellers' => 'Unverified Suppliers',
            'Pending Seller' => 'Pending Supplier',
            'Pending Sellers' => 'Pending Suppliers',
            'Pending Seller List' => 'Pending Supplier List',
            'Applied Seller' => 'Applied Supplier',
            'All Seller' => 'All Supplier',
            'All Sellers' => 'All Suppliers',
            'Total Sellers' => 'Total Suppliers',

            // Dashboard & Management
            'Seller Details' => 'Supplier Details',
            'Seller Info' => 'Supplier Info',
            'Seller Information' => 'Supplier Information',
            'Seller Name' => 'Supplier Name',
            'Seller Address' => 'Supplier Address',
            'Seller Products' => 'Supplier Products',
            'Seller Product' => 'Supplier Product',
            'Seller Orders' => 'Supplier Orders',
            'Seller Payments' => 'Supplier Payments',
            'Seller Payout' => 'Supplier Payout',
            'Seller Earning' => 'Supplier Earning',
            'Seller Commission' => 'Supplier Commission',
            'Seller Coupons' => 'Supplier Coupons',
            'Seller Packages' => 'Supplier Packages',
            'Seller Subscription' => 'Supplier Subscription',
            'Seller Zone' => 'Supplier Zone',
            'Seller Policy' => 'Supplier Policy',
            'Seller Privacy Policy' => 'Supplier Privacy Policy',
            'Seller Templates' => 'Supplier Templates',
            'Seller Guarantees' => 'Supplier Guarantees',
            'Seller Message' => 'Supplier Message',
            'Seller Photo' => 'Supplier Photo',
            'Seller Selfie' => 'Supplier Selfie',
            'Seller App Link' => 'Supplier App Link',
            'Download Seller App' => 'Download Supplier App',
            'Seller Not Found' => 'Supplier Not Found',
            "Seller's" => "Supplier's",

            // Commission
            'Seller Based Commission' => 'Supplier Based Commission',
            'Seller Based Commission Rate' => 'Supplier Based Commission Rate',
            'Seller Based Commission Set Successfully' => 'Supplier Based Commission Set Successfully',
            'Set Seller Based Commission' => 'Set Supplier Based Commission',
            'Seller Commission Activatation' => 'Supplier Commission Activatation',
            'Preorder Seller Commission' => 'Preorder Supplier Commission',
            'Seller Based Selling Report' => 'Supplier Based Selling Report',

            // Shipping
            'Seller Wise Shipping Cost' => 'Supplier Wise Shipping Cost',

            // Product Features
            'Seller Products Sale' => 'Supplier Products Sale',
            'Sellers Products' => 'Suppliers Products',
            'Sellers Sales' => 'Suppliers Sales',
            'Sellers preorder sales' => 'Suppliers preorder sales',
            'Admin Approval On Seller Product' => 'Admin Approval On Supplier Product',
            'Seller Product Manage By Admin' => 'Supplier Product Manage By Admin',
            'Seller Auction Products' => 'Supplier Auction Products',
            'Seller Wholesale Products' => 'Supplier Wholesale Products',
            'Auction Product for Seller' => 'Auction Product for Supplier',
            'Digital Product for Seller' => 'Digital Product for Supplier',
            'Wholesale Product for Seller' => 'Wholesale Product for Supplier',
            'Preorder Product for Seller' => 'Preorder Product for Supplier',
            'Product External Link for Seller' => 'Product External Link for Supplier',
            'Seller Products?' => 'Supplier Products?',

            // Follow
            'Follow Seller' => 'Follow Supplier',
            'Unfollow Seller' => 'Unfollow Supplier',
            'Unfollow This Seller' => 'Unfollow This Supplier',
            'Followed Sellers' => 'Followed Suppliers',
            'Seller Rating & Followers' => 'Supplier Rating & Followers',
            'Sellers Review & Followers ' => 'Suppliers Review & Followers ',
            'Edit Seller Custom Followers' => 'Edit Supplier Custom Followers',

            // Best/Top
            'Best Sellers' => 'Best Suppliers',
            'Top Sellers' => 'Top Suppliers',
            'Top Seller & Products' => 'Top Supplier & Products',
            'Top Sellers Section Settings' => 'Top Suppliers Section Settings',

            // Withdraw
            'Seller Withdraw Request' => 'Supplier Withdraw Request',
            'Withdraw Seller Amount' => 'Withdraw Supplier Amount',
            'Minimum Seller Amount Withdraw' => 'Minimum Supplier Amount Withdraw',
            'Seller Can Access' => 'Supplier Can Access',
            'Seller Can Add Note' => 'Supplier Can Add Note',

            // Custom Labels
            'Sellers Can Create Custom Label' => 'Suppliers Can Create Custom Label',
            'Allow Sellers to Create' => 'Allow Suppliers to Create',
            'Allow Sellers to Use' => 'Allow Suppliers to Use',
            'Disable for Sellers' => 'Disable for Suppliers',

            // UI Actions & Page Labels
            'Choose Seller' => 'Choose Supplier',
            'Message Seller' => 'Message Supplier',
            'View All Sellers' => 'View All Suppliers',
            'More from this Seller' => 'More from this Supplier',
            'Products from this Seller' => 'Products from this Supplier',
            'Note From Seller' => 'Note From Supplier',
            'For Seller Products' => 'For Supplier Products',
            'For Seller Store' => 'For Supplier Store',
            'Due to seller' => 'Due to supplier',
            'Pay to seller' => 'Pay to supplier',
            'Log in as this Seller' => 'Log in as this Supplier',
            'Ban this seller' => 'Ban this supplier',
            'Unban this seller' => 'Unban this supplier',
            'this seller?' => 'this supplier?',
            'Edit Seller Information' => 'Edit Supplier Information',
            'Edit Seller GSTIN Number' => 'Edit Supplier GSTIN Number',
            'Offline Seller Package Payments' => 'Offline Supplier Package Payments',
            'Seller Package Payment' => 'Supplier Package Payment',
            ' Ask To Seller ' => ' Ask To Supplier ',
            'Show Other Counpons For This Seller' => 'Show Other Coupons For This Supplier',

            // Flash Messages & Notifications
            'Seller has been added successfully' => 'Supplier has been added successfully',
            'Seller has been approved successfully' => 'Supplier has been approved successfully',
            'Seller has been banned successfully' => 'Supplier has been banned successfully',
            'Seller has been unbanned successfully' => 'Supplier has been unbanned successfully',
            'Seller has been deleted successfully' => 'Supplier has been deleted successfully',
            'Seller has been updated successfully' => 'Supplier has been updated successfully',
            'Seller verification request has been rejected successfully' => 'Supplier verification request has been rejected successfully',
            'Seller commission is added successfully.' => 'Supplier commission is added successfully.',
            'Seller custom follower has been updated successfully.' => 'Supplier custom follower has been updated successfully.',
            'Seller GSTIN has been updated successfully!' => 'Supplier GSTIN has been updated successfully!',
            'Seller follow is successfull' => 'Supplier follow is successfull',
            'Seller unfollow is successfull' => 'Supplier unfollow is successfull',
            'Seller is followed Successfully' => 'Supplier is followed Successfully',
            'Seller is unfollowed Successfully' => 'Supplier is unfollowed Successfully',
            'Seller suspected Successfully' => 'Supplier suspected Successfully',
            'Sellert unsuspected  Successfully' => 'Supplier unsuspected Successfully',
            'Seller registration failed. Please try again later.' => 'Supplier registration failed. Please try again later.',
            'Seller did not respond yet' => 'Supplier did not respond yet',
            'Message has been sent to seller' => 'Message has been sent to supplier',
            'Admin note seller access status update successfully' => 'Admin note supplier access status update successfully',
            'Custom Label seller access updated successfully' => 'Custom Label supplier access updated successfully',
            'Approved sellers updated successfully' => 'Approved suppliers updated successfully',
            'Pending sellers Approved successfully' => 'Pending suppliers Approved successfully',
            'Unverified sellers Verified successfully' => 'Unverified suppliers Verified successfully',
            'No payment history available for this seller' => 'No payment history available for this supplier',
            'No products from this seller found!' => 'No products from this supplier found!',
            'No queries have been asked to the seller yet' => 'No queries have been asked to the supplier yet',
            'This seller is followed' => 'This supplier is followed',
            'This seller is unfollowed' => 'This supplier is unfollowed',
            'This user already a seller' => 'This user already a supplier',
            'Admin or Customer cannot be a seller' => 'Admin or Customer cannot be a supplier',
            'Admin or seller cannot be a customer' => 'Admin or supplier cannot be a customer',
            'Seller cannot Place Bid to His Own Product' => 'Supplier cannot Place Bid to His Own Product',
            'Sorry, Only customers & Sellers can Bid.' => 'Sorry, Only customers & Suppliers can Bid.',
            'GST verification is pending for This Seller' => 'GST verification is pending for This Supplier',
            'Please Select Seller first.' => 'Please Select Supplier first.',

            // Long form descriptions
            'Your Shop has been created successfully! Your seller account is under review. We will notify you once approved. ' => 'Your Shop has been created successfully! Your supplier account is under review. We will notify you once approved. ',
            'Your seller account is under review. We will notify you once approved.' => 'Your supplier account is under review. We will notify you once approved.',
            'You need to login as a customer to follow this seller' => 'You need to login as a customer to follow this supplier',
            'You need to configure SMTP correctly to to add Seller.' => 'You need to configure SMTP correctly to add Supplier.',
            'After activate this option Cash On Delivery of Seller product will be managed by Admin' => 'After activate this option Cash On Delivery of Supplier product will be managed by Admin',
            'After activate this option, Admin approval need to seller product' => 'After activate this option, Admin approval need to supplier product',
            'After activating this option, sellers can add digital products.' => 'After activating this option, suppliers can add digital products.',
            'The seller does not have permissions to add a note' => 'The supplier does not have permissions to add a note',
            'of seller product price will be deducted from seller earnings' => 'of supplier product price will be deducted from supplier earnings',
            ' to submit your questions to seller' => ' to submit your questions to supplier',
            'Get WhatsApp Order for Seller products' => 'Get WhatsApp Order for Supplier products',
            'Use for other orders of this seller after final order' => 'Use for other orders of this supplier after final order',
            'Do you really want to ban this seller?' => 'Do you really want to ban this supplier?',
            'Do you really want to unban this seller?' => 'Do you really want to unban this supplier?',

            // Commission descriptions
            ' Seller Commission is not Activated, Active ' => ' Supplier Commission is not Activated, Active ',
            'Commission Type is not Seller Based, set commission type ' => 'Commission Type is not Supplier Based, set commission type ',
            'If the Commission Type is Seller Based, set commission percentage ' => 'If the Commission Type is Supplier Based, set commission percentage ',
            'You are Under Seller Based Commission. Commission Rate' => 'You are Under Supplier Based Commission. Commission Rate',
            'Are you sure you want to set this Seller Based Commission?' => 'Are you sure you want to set this Supplier Based Commission?',

            // Shipping descriptions
            'You have selected Seller Wise Flat Shipping Cost' => 'You have selected Supplier Wise Flat Shipping Cost',
            'A fixed rate is set for each seller. If a customer buys products from two sellers, the total shipping cost is the sum of each seller\'s rate.' => 'A fixed rate is set for each supplier. If a customer buys products from two suppliers, the total shipping cost is the sum of each supplier\'s rate.',
            'Each seller has a fixed shipping rate. Admin can set their rate here, and sellers set theirs from their panel. If a customer buys from multiple sellers, shipping costs are added together' => 'Each supplier has a fixed shipping rate. Admin can set their rate here, and suppliers set theirs from their panel. If a customer buys from multiple suppliers, shipping costs are added together',

            // Custom labels descriptions
            'Are you sure you want to allow sellers to create custom labels?' => 'Are you sure you want to allow suppliers to create custom labels?',
            'Are you sure you want to allow this Custom Label for Seller?' => 'Are you sure you want to allow this Custom Label for Supplier?',
            'Are you sure you want to close this Custom Label for Seller?' => 'Are you sure you want to close this Custom Label for Supplier?',
            'Are you sure you want to disable custom label creation for sellers?' => 'Are you sure you want to disable custom label creation for suppliers?',
            'Sellers will be able to create their own custom labels.' => 'Suppliers will be able to create their own custom labels.',
            'Sellers will be able to use this custom label for their products.' => 'Suppliers will be able to use this custom label for their products.',
            'Sellers will no longer be able to create custom labels.' => 'Suppliers will no longer be able to create custom labels.',
            'Sellers will no longer be use this custom label for their products.' => 'Suppliers will no longer be use this custom label for their products.',

            // Login page images
            'Will be used in Admin login page, Seller login page & Delivery Boy login page' => 'Will be used in Admin login page, Supplier login page & Delivery Boy login page',
            'Will be used in Admin login page, Seller login page & Delivery Boy login page. Minimum dimensions required: 189px width X 31px height.' => 'Will be used in Admin login page, Supplier login page & Delivery Boy login page. Minimum dimensions required: 189px width X 31px height.',

            // Fixed area shipping description
            'Fixed rate for each area. If customers purchase multiple products from one seller shipping cost is calculated by the customer shipping area.' => 'Fixed rate for each area. If customers purchase multiple products from one supplier shipping cost is calculated by the customer shipping area.',
        ];

        foreach ($mappings as $originalKey => $supplierValue) {
            $lang_key = preg_replace('/[^A-Za-z0-9\_]/', '', str_replace(' ', '_', strtolower($originalKey)));

            Translation::updateOrCreate(
                ['lang' => 'en', 'lang_key' => $lang_key],
                ['lang_value' => $supplierValue]
            );
        }

        // Clear translation caches so changes take effect immediately
        Cache::forget('translations-en');

        $this->command->info('✅ Seller → Supplier translation mappings seeded successfully (' . count($mappings) . ' entries).');
    }
}
