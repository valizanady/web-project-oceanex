#!/usr/bin/env python3
import re
import os

def minify_css(input_file, output_file):
    """Minify CSS file"""
    with open(input_file, 'r', encoding='utf-8') as f:
        content = f.read()
    
    original_size = len(content)
    
    # Remove comments
    content = re.sub(r'/\*.*?\*/', '', content, flags=re.DOTALL)
    
    # Remove extra whitespace
    content = re.sub(r'\s+', ' ', content)
    content = re.sub(r'\s*([{}:;,>+~])\s*', r'\1', content)
    
    # Remove trailing semicolons
    content = re.sub(r';}', '}', content)
    
    # Remove spaces around { and }
    content = re.sub(r'\s*{\s*', '{', content)
    content = re.sub(r'\s*}\s*', '}', content)
    
    content = content.strip()
    
    minified_size = len(content)
    
    with open(output_file, 'w', encoding='utf-8') as f:
        f.write(content)
    
    print(f"✅ {input_file} → {output_file}")
    print(f"   Original: {original_size:,} bytes")
    print(f"   Minified: {minified_size:,} bytes")
    print(f"   Saved: {original_size - minified_size:,} bytes ({100 - (minified_size/original_size)*100:.1f}% reduction)")
    print()

# Minify CSS files
minify_css('css/global-styles.css', 'css/global-styles.min.css')
minify_css('css/templatemo-tiya-golf-club.css', 'css/templatemo-tiya-golf-club.min.css')

print("🎉 CSS minification complete!")
