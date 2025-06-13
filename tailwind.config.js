/** @type {import('tailwindcss').Config} */
export default {
    content: ['./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php', './storage/framework/views/*.php', './resources/**/*.blade.php', './resources/**/*.js', './resources/**/*.vue',],
    theme: {
        extend: {
            fontSize: {
                // Base text sizes
                'xs': ['0.75rem', { lineHeight: '1rem' }],         // 12px - Small UI elements, footnotes, badges
                'sm': ['0.875rem', { lineHeight: '1.25rem' }],     // 14px - Secondary text, captions, labels
                'base': ['1rem', { lineHeight: '1.5rem' }],        // 16px - Body text, form inputs, buttons
                'lg': ['1.125rem', { lineHeight: '1.75rem' }],     // 18px - Emphasized body text
                'xl': ['1.25rem', { lineHeight: '1.75rem' }],      // 20px - Small headings (h4)
                '2xl': ['1.5rem', { lineHeight: '2rem' }],         // 24px - Medium headings (h3)
                '3xl': ['1.875rem', { lineHeight: '2.25rem' }],    // 30px - Large headings (h2)
                '4xl': ['2.25rem', { lineHeight: '2.5rem' }],      // 36px - Extra large headings (h1)
                '5xl': ['3rem', { lineHeight: '1' }],              // 48px - Display headings
                '6xl': ['3.75rem', { lineHeight: '1' }],           // 60px - Largest display headings
            },
        },
    },
    plugins: [],
    darkMode: 'class',
};
