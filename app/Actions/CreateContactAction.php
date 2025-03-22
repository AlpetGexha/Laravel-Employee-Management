<?php

namespace App\Actions;

use App\Http\Requests\CreateContactRequest;
use App\Jobs\SendContactMailJob;
use App\Models\Contact;

class CreateContactAction
{

    public function handle(CreateContactRequest $request): void
    {
        $contact = Contact::create($request->validated());

        SendContactMailJob::dispatch($contact);
    }

}
