<?php

/**
 * InvoicePlane Configuration
 *
 * This file contains all InvoicePlane-specific configuration options.
 * Settings are loaded from the database and can be managed through the admin panel.
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Application Settings
    |--------------------------------------------------------------------------
    */
    'version' => '2.0.0',
    'force_https' => false,
    'timezone' => 'UTC',
    'language' => 'en',
    'skin' => 'skin-invoiceplane.min.css',
    'header_title_text' => 'InvoicePlane',
    
    /*
    |--------------------------------------------------------------------------
    | Display Settings
    |--------------------------------------------------------------------------
    */
    'display_client_unique_name' => false,
    'display_profile_image' => false,
    'default_num_per_page' => 15,
    'results_per_page' => 15,
    'use24_hour_time_format' => false,
    
    /*
    |--------------------------------------------------------------------------
    | Date and Time Settings
    |--------------------------------------------------------------------------
    */
    'date_format' => 'Y-m-d',
    'datepicker_format' => 'yyyy-mm-dd',
    
    /*
    |--------------------------------------------------------------------------
    | Currency Settings
    |--------------------------------------------------------------------------
    */
    'base_currency' => 'USD',
    'currency' => null,
    'amount_decimals' => 2,
    'round_tax_decimals' => false,
    'currency_conversion_driver' => null,
    'exchange_rate_mode' => 'automatic',
    
    /*
    |--------------------------------------------------------------------------
    | Invoice Settings
    |--------------------------------------------------------------------------
    */
    'invoice_group' => 1,
    'invoice_template' => 'default',
    'invoice_terms' => '',
    'invoice_footer' => '',
    'invoices_due_after' => 30,
    'invoice_status_filter' => 'all_statuses',
    'reset_invoice_date_email_draft' => false,
    'default_company_profile' => 1,
    'item_tax_rate' => 0,
    'item_tax2_rate' => 0,
    
    /*
    |--------------------------------------------------------------------------
    | Quote Settings
    |--------------------------------------------------------------------------
    */
    'quote_group' => 1,
    'quote_template' => 'default',
    'quote_terms' => '',
    'quote_footer' => '',
    'quotes_expire_after' => 15,
    'quote_status_filter' => 'all_statuses',
    'reset_quote_date_email_draft' => false,
    'convert_quote_terms' => false,
    'convert_quote_when_approved' => false,
    
    /*
    |--------------------------------------------------------------------------
    | Email Settings
    |--------------------------------------------------------------------------
    */
    'mail_driver' => null,
    'mail_host' => null,
    'mail_port' => null,
    'mail_encryption' => null,
    'mail_username' => null,
    'mail_password' => null,
    'mail_sendmail' => '/usr/sbin/sendmail -bs',
    'mail_allow_self_signed_certificate' => false,
    'mail_configured' => false,
    'mail_default_cc' => null,
    'mail_default_bcc' => null,
    'mail_reply_to_address' => null,
    
    /*
    |--------------------------------------------------------------------------
    | Email Templates
    |--------------------------------------------------------------------------
    */
    'invoice_email_subject' => 'New Invoice',
    'invoice_email_body' => '',
    'quote_email_subject' => 'New Quote',
    'quote_email_body' => '',
    'overdue_invoice_email_subject' => 'Overdue Invoice',
    'overdue_invoice_email_body' => '',
    'upcoming_payment_notice_email_subject' => 'Upcoming Payment Notice',
    'upcoming_payment_notice_email_body' => '',
    'payment_receipt_email_subject' => 'Payment Receipt',
    'payment_receipt_body' => '',
    'quote_approved_email_body' => '',
    'quote_rejected_email_body' => '',
    
    /*
    |--------------------------------------------------------------------------
    | Email Automation
    |--------------------------------------------------------------------------
    */
    'automatic_email_on_recur' => false,
    'automatic_email_payment_receipts' => false,
    'overdue_invoice_reminder_frequency' => 7,
    'upcoming_payment_notice_frequency' => 3,
    'attach_pdf' => true,
    
    /*
    |--------------------------------------------------------------------------
    | PDF Settings
    |--------------------------------------------------------------------------
    */
    'pdf_driver' => 'domPdf',
    'pdf_binary_path' => '/usr/local/bin/wkhtmltopdf',
    'paper_size' => 'letter',
    'paper_orientation' => 'portrait',
    
    /*
    |--------------------------------------------------------------------------
    | Payment Settings
    |--------------------------------------------------------------------------
    */
    'allow_payments_without_balance' => false,
    'online_payment_method' => null,
    'merchant' => '{}',
    
    /*
    |--------------------------------------------------------------------------
    | Address Format
    |--------------------------------------------------------------------------
    */
    'address_format' => "{street}\n{city}, {state} {zip}\n{country}",
    
    /*
    |--------------------------------------------------------------------------
    | Client Center
    |--------------------------------------------------------------------------
    */
    'client_center_request' => false,
    
    /*
    |--------------------------------------------------------------------------
    | Dashboard Widgets
    |--------------------------------------------------------------------------
    */
    'widget_invoice_summary_dashboard_totals' => 'year-to-date',
    'widget_invoice_summary_dashboard_totals_from_date' => null,
    'widget_invoice_summary_dashboard_totals_to_date' => null,
    'widget_quote_summary_dashboard_totals' => 'year-to-date',
    'widget_quote_summary_dashboard_totals_from_date' => null,
    'widget_quote_summary_dashboard_totals_to_date' => null,
    
    /*
    |--------------------------------------------------------------------------
    | Menus
    |--------------------------------------------------------------------------
    */
    'menus' => [
        'navigation' => [],
        'reports' => [],
        'system' => [],
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Setting Validation Rules
    |--------------------------------------------------------------------------
    */
    'setting_validation_rules' => [],
];
