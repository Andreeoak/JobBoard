<label class="mb-2 blck text-sm font-medium text-slate-900"
for ="{{ $for }}">
    {{ $slot }} @if($required) <span>*</span> @endif
</label>
