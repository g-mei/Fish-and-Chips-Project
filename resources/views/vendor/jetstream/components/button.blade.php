<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-primary border-transparent rounded-md font-bold text-xs text-secondary uppercase tracking-widest hover:bg-secondary hover:text-primary active:bg-primary focus:outline-none focus:border-primary focus:ring focus:ring-primary disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
