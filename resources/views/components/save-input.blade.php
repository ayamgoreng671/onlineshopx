<div {{$attributes->merge(['class' => 'w-full px-6'])}}>
    <input {{$attributes->merge(['class'=>'text-center focus:ring-2 ring-amber-800 inset-2 ring-offset-2 rounded-md px-6 py-2 w-full hover:bg-amber-500 active:bg-amber-800 focus:bg-amber-700 cursor-pointer dark:text-white bg-amber-600',
    'type' => 'submit',
    'value'=>'Save'])}}>
</div>