@if( count($records) < 1 )
	<tr class="cgm-norecords">
		<td colspan="100%">{!! DEFAULT_NO_RECORD_MESSAGE !!}</td>
	</tr>
	<?php return; ?>
@endif
@foreach ($records as $record )
	<tr class="view-clickable">
         <?php if($record->flag==1){
             $language=$record->language ;
		}
		else{
            $language='Other'."(".$record->language.")" ;
			 }?>
		<td>{{ $records->recordno->getNext() }}</td>
		<td style="white-space: nowrap" class="view" onclick="actionForm('{{ action('PersonController@adminview', [$record->id] ) }}', {}, 'idMemberAddWrap' )" >{{ $record->reg_no }}</td>
		<td class="view"  onclick="actionForm('{{ action('PersonController@adminview', [$record->id] ) }}', {}, 'idMemberAddWrap' )" >{{ $record->mobile }}</td>
		<td class="view"  onclick="actionForm('{{ action('PersonController@adminview', [$record->id] ) }}', {}, 'idMemberAddWrap' )" >{{ $record->name }}</td>
		<td class="view"  onclick="actionForm('{{ action('PersonController@adminview', [$record->id] ) }}', {}, 'idMemberAddWrap' )" >{{ \Qudratom\Utilities\Helper::tellGender( $record->gender ) }}</td>
		<td style="white-space: nowrap" class="view"  onclick="actionForm('{{ action('PersonController@adminview', [$record->id] ) }}', {}, 'idMemberAddWrap' )" >{{ \Qudratom\Utilities\DateTime::clientDate( $record->dob ) }}</td>
		<td class="view"  onclick="actionForm('{{ action('PersonController@adminview', [$record->id] ) }}', {}, 'idMemberAddWrap' )" >{{ \App\Models\Virtual\MaritalStatus::explain( $record->marital_status ) }}</td>
		<td class="view"  onclick="actionForm('{{ action('PersonController@adminview', [$record->id] ) }}', {}, 'idMemberAddWrap' )" >{{ \App\Models\Virtual\AgeGroups::explainGroup( $record->agegroup ) }}</td>
		<td class="view"  onclick="actionForm('{{ action('PersonController@adminview', [$record->id] ) }}', {}, 'idMemberAddWrap' )" >{{ $language}}</td>
		<td style="width: 1px;" class="view"  onclick="actionForm('{{ action('PersonController@adminview', [$record->id] ) }}', {}, 'idMemberAddWrap' )" >{{ \App\Models\Virtual\Testaments::explain($record->testament) }}</td>
		<td class="view"  onclick="actionForm('{{ action('PersonController@adminview', [$record->id] ) }}', {}, 'idMemberAddWrap' )" >{{ \App\Models\Virtual\StatusTypes::explain( $record->status ) }}</td>
		<td  class="action-column">
			<a class="green" href="javascript:;"
			   	onclick="actionForm('{{ action('PersonController@adminedit', [$record->id, true] ) }}', {}, 'idMemberAddWrap' )" title="Edit">
				<i class="fa fa-pencil bigger-130"   title="Edit"></i>
			</a>

			<a class="green" href="javascript:;"
			   	onclick="actionForm('{{ action( 'MemberController@acknowledge', [$record->id] ) }}', {}, 'idMemberAddWrap' )" title="acknowledge">
				<i class="fa fa-envelope" aria-hidden="true"  ></i>
			</a>
		</td>
	</tr>
@endforeach