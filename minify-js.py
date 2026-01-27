#!/usr/bin/env python3
import re
import os

def minify_js(input_file, output_file):
    """Minify JavaScript file"""
    with open(input_file, 'r', encoding='utf-8') as f:
        content = f.read()
    
    original_size = len(content)
    
    # Remove single-line comments but keep URLs
    content = re.sub(r'(?<!:)//(?!//).*?(?=\n|$)', '', content)
    
    # Remove multi-line comments
    content = re.sub(r'/\*.*?\*/', '', content, flags=re.DOTALL)
    
    # Remove extra whitespace but preserve strings
    lines = content.split('\n')
    minified_lines = []
    for line in lines:
        line = line.strip()
        if line:
            minified_lines.append(line)
    
    content = '\n'.join(minified_lines)
    
    # Remove spaces around operators (careful with strings)
    content = re.sub(r'\s*([{}()\[\]:;,<>!=+\-*/&|?])\s*', r'\1', content)
    
    # Fix spacing after keywords
    keywords = ['if', 'else', 'for', 'while', 'function', 'return', 'const', 'let', 'var', 'class']
    for keyword in keywords:
        content = re.sub(f'{keyword}\\(', f'{keyword} (', content)
    
    minified_size = len(content)
    
    with open(output_file, 'w', encoding='utf-8') as f:
        f.write(content)
    
    print(f"✅ {input_file} → {output_file}")
    print(f"   Original: {original_size:,} bytes")
    print(f"   Minified: {minified_size:,} bytes")
    print(f"   Saved: {original_size - minified_size:,} bytes ({100 - (minified_size/original_size)*100:.1f}% reduction)")
    print()

# Minify translations.js
minify_js('js/translations.js', 'js/translations.min.js')

# Minify custom.js
minify_js('js/custom.js', 'js/custom.min.js')

print("🎉 Minification complete!")
