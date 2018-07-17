@extends('partials.layout')
@section('content')
<div class="third-page">
  <div class="half-page-content mt-20">
    <h4 class="text-header text-upper">
      Viewing ticket #{{ $ticket->id }}
    </h4>
    <p class="text-beige col-md-6 col-center">
      Currently you are viewing ticket #{{ $ticket->id }}.
    </p>
  </div>
</div>
<div class="container col-md-6 text-grey mt-20">
<div class="row">


  <div class="col-md-12">
  <h5 class="border-bottom mb-10">
    Created by
    <span class="float-right">
      {{ $ticket->name }}
    </span>
  </h5>
  </div>

  <div class="col-md-12">
  <h5 class="border-bottom mb-10">
    Created at
    <span class="float-right">
      {{ date('Y-m-d, H:i:s', $ticket->createTime) }}
    </span>
  </h5>
  </div>

  <div class="col-md-12">
  <h5 class="border-bottom mb-10">
    Last modified at
    <span class="float-right">
      {{ date('Y-m-d, H:i:s', $ticket->lastModifiedTime) }}
    </span>
  </h5>
  </div>

  <div class="col-md-12">
  <h5 class="border-bottom mb-10">
    Ticket status
    <span class="float-right">
      {{ Helpers::getTicketStatus($ticket->type) }}
    </span>
  </h5>
  </div>
  @if ( $ticket->type  == 0)
  @if ( $ticket->assignedTo > 0)
  <div class="col-md-12">
  <h5 class="border-bottom mb-10">
    Assigned to
    <span class="float-right">
      <img src='{{ asset('images/icons/gm.png') }}' />
      <span class="text-gamemaster">
        {{ Helpers::getCharacterNameFromGuid($ticket->assignedTo) }}
      </span>
    </span>
  </h5>
  </div>
  @endif
  @else
  @if ( $ticket->closedBy  > 0)
  <div class="col-md-12">
  <h5 class="border-bottom mb-10">
    Closed by
    <span class="float-right">
      @if ($ticket->closedBy == $ticket->playerGuid)
      You
      @else
      <img src='{{ asset('images/icons/gm.png') }}' />
      <span class="text-gamemaster">
        {{ Helpers::getCharacterNameFromGuid($ticket->closedBy) }}
      </span>
      @endif
    </span>
  </h5>
  </div>
  @endif
  @endif
  <div class="col-md-12 mt-20">
  <h5 class="border-bottom mb-10">
    Description:
  </h5>
  <p>
    {{ $ticket->description }}
  </p>
</div>

</div>
</div>
@endsection
