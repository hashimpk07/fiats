<?php

namespace Qudratom\Utilities;


use App\Models\AccountEntry;
use App\Models\AccountEntryItem;

use Illuminate\Support\Facades\DB;

class Journal
{
    /**
     * Single currency entry
     *
     * Expected indices
     * cr : credit data
     * dr : debit records
     *
     * array(
     *   'cr' => array( array('amount' => 10, 'ledger_id' => 1) ),
     *   'dr' => array( array('amount' => 10, 'ledger_id' => 2) )
     * )
     *
     * @param $data
     */
    public function entry($currencyId, $data)
    {
        $crTotal = 0 ;
        $drTotal = 0 ;

        //find entry total
        if( @count($data['cr']) > 0 ) {
            foreach ($data['cr'] as $credit) {
                $amount = $credit['amount'];
                $crTotal += $amount;
            }
        }
        if( @count($data['dr']) > 0 ) {
            foreach ($data['dr'] as $debit) {
                $amount = $debit['amount'];
                $drTotal += $amount;
            }
        }

        DB::beginTransaction();

            //insert totals
            $e = new AccountEntry();
            $e->account_entry_type_domains_id = ACCOUNT_ENTRY_TYPE_DOMAIN_JOURNAL ;
            $e->dr_total = $drTotal ;
            $e->cr_total = $crTotal ;
            $e->currency_id = $currencyId ;
            $e->remarks = '' ;
            $e->save() ;
            $entryId = $e->id ;

            if( @count($data['cr']) > 0 ) {
                foreach ($data['cr'] as $credit) {
                    $amount = $credit['amount'];
                    $ledgerId = $credit['ledger_id'];

                    $ei = new AccountEntryItem();
                    $ei->account_entry_id = $entryId;
                    $ei->account_ledger_id = $ledgerId;
                    $ei->amount = $amount;
                    $ei->dc = \DC::CREDIT;
                    $ei->save();
                }
            }
            if( @count($data['dr']) > 0 ) {
                foreach ($data['dr'] as $debit) {
                    $amount = $debit['amount'];
                    $ledgerId = $debit['ledger_id'];

                    $ei = new AccountEntryItem();
                    $ei->account_entry_id = $entryId;
                    $ei->account_ledger_id = $ledgerId;
                    $ei->amount = $amount;
                    $ei->dc = \DC::DEBIT;
                    $ei->save();
                }
            }

        DB::commit() ;
    }
}