import os
from PIL import Image, ImageDraw, ImageFont, ImageFilter

def create_og_image():
    width = 1200
    height = 630
    
    # Base dark background
    img = Image.new("RGBA", (width, height), (11, 11, 14, 255))
    
    # Create glow overlay
    glow = Image.new("RGBA", (width, height), (0, 0, 0, 0))
    glow_draw = ImageDraw.Draw(glow)
    
    # Radial glowing gradient in top-center / center
    # Brand orange: #FF5A00 / #F97316
    glow_draw.ellipse((width//2 - 380, -100, width//2 + 380, 420), fill=(255, 90, 0, 55))
    glow_draw.ellipse((width//2 - 200, 30, width//2 + 200, 330), fill=(255, 120, 30, 75))
    glow = glow.filter(ImageFilter.GaussianBlur(80))
    
    img = Image.alpha_composite(img, glow)
    draw = ImageDraw.Draw(img)
    
    # Border / Card stroke
    draw.rounded_rectangle((24, 24, width - 24, height - 24), radius=28, outline=(255, 255, 255, 25), width=2)
    
    # Load fonts
    font_paths = [
        "/System/Library/Fonts/SFPro-Bold.ttf",
        "/System/Library/Fonts/SFProDisplay-Bold.otf",
        "/System/Library/Fonts/Helvetica.ttc",
        "/Library/Fonts/Arial Bold.ttf"
    ]
    
    regular_font_paths = [
        "/System/Library/Fonts/SFPro-Regular.ttf",
        "/System/Library/Fonts/SFProText-Regular.otf",
        "/System/Library/Fonts/Helvetica.ttc",
        "/Library/Fonts/Arial.ttf"
    ]
    
    def get_font(paths, size):
        for p in paths:
            if os.path.exists(p):
                try:
                    return ImageFont.truetype(p, size)
                except Exception:
                    pass
        return ImageFont.load_default()

    font_title = get_font(font_paths, 68)
    font_tagline = get_font(font_paths, 32)
    font_sub = get_font(regular_font_paths, 24)
    font_badge = get_font(font_paths, 18)
    font_url = get_font(font_paths, 20)
    
    # Place logo emblem if exists
    emblem_path = "public/assets/logo-emblem-transparent.png"
    if not os.path.exists(emblem_path):
        emblem_path = "public/assets/logo-raw.png"
        
    logo_y = 100
    if os.path.exists(emblem_path):
        try:
            emblem = Image.open(emblem_path).convert("RGBA")
            # Resize maintaining aspect ratio
            emblem.thumbnail((140, 140), Image.Resampling.LANCZOS)
            emb_w, emb_h = emblem.size
            img.paste(emblem, ((width - emb_w) // 2, logo_y), emblem)
            logo_y += emb_h + 20
        except Exception as e:
            print("Logo paste exception:", e)
            logo_y = 160
    else:
        logo_y = 160
        
    # Draw Title: DAOZ360
    title_text = "DAOZ360"
    draw.text((width // 2, logo_y), title_text, fill=(247, 247, 245, 255), font=font_title, anchor="mt")
    
    # Draw Tagline: Plan. Publish. Grow.
    tagline_y = logo_y + 80
    tagline_text = "Plan. Publish. Grow."
    draw.text((width // 2, tagline_y), tagline_text, fill=(255, 90, 0, 255), font=font_tagline, anchor="mt")
    
    # Subheading: All-in-One Social Media Management Platform
    sub_y = tagline_y + 50
    sub_text = "Unified Content Scheduling • Analytics • Multi-Network Workflow"
    draw.text((width // 2, sub_y), sub_text, fill=(161, 161, 170, 255), font=font_sub, anchor="mt")
    
    # Feature Badges
    badges = ["Multi-Channel Calendar", "Smart Approvals", "Real-Time Analytics", "Automated Assistance"]
    badge_y = sub_y + 65
    
    # Calculate total badges width
    padding_x = 18
    padding_y = 10
    spacing = 16
    badge_rects = []
    total_w = 0
    
    for b in badges:
        bbox = font_badge.getbbox(b)
        w = (bbox[2] - bbox[0]) + padding_x * 2
        h = (bbox[3] - bbox[1]) + padding_y * 2
        badge_rects.append((b, w, h))
        total_w += w
    total_w += spacing * (len(badges) - 1)
    
    curr_x = (width - total_w) // 2
    for b, w, h in badge_rects:
        draw.rounded_rectangle((curr_x, badge_y, curr_x + w, badge_y + h), radius=12, fill=(24, 24, 30, 220), outline=(255, 255, 255, 30), width=1)
        draw.text((curr_x + w // 2, badge_y + h // 2), b, fill=(228, 228, 231, 255), font=font_badge, anchor="mm")
        curr_x += w + spacing
        
    # Domain Footer Pill
    footer_y = height - 90
    domain_text = "https://daoz360.ai"
    dom_bbox = font_url.getbbox(domain_text)
    dom_w = (dom_bbox[2] - dom_bbox[0]) + 36
    dom_h = (dom_bbox[3] - dom_bbox[1]) + 20
    dom_x = (width - dom_w) // 2
    
    draw.rounded_rectangle((dom_x, footer_y, dom_x + dom_w, footer_y + dom_h), radius=20, fill=(255, 90, 0, 35), outline=(255, 90, 0, 100), width=1)
    draw.text((width // 2, footer_y + dom_h // 2), domain_text, fill=(255, 140, 50, 255), font=font_url, anchor="mm")
    
    # Save output
    os.makedirs("public/assets", exist_ok=True)
    img_rgb = img.convert("RGB")
    img_rgb.save("public/assets/og-preview.png", "PNG", quality=95)
    img_rgb.save("public/og-image.png", "PNG", quality=95)
    img_rgb.save("dist/assets/og-preview.png", "PNG", quality=95)
    img_rgb.save("dist/og-image.png", "PNG", quality=95)
    print("Created public/assets/og-preview.png and public/og-image.png (1200x630)")

def create_pwa_icons():
    # Source emblem
    src_path = "public/favicon.png"
    if not os.path.exists(src_path):
        return
        
    src = Image.open(src_path).convert("RGBA")
    
    sizes = [(180, "apple-touch-icon.png"), (192, "icon-192.png"), (512, "icon-512.png")]
    for sz, name in sizes:
        # Create dark rounded background for app icon
        bg = Image.new("RGBA", (sz, sz), (11, 11, 14, 255))
        draw = ImageDraw.Draw(bg)
        # Inner glow
        draw.ellipse((0, 0, sz, sz), fill=(255, 90, 0, 30))
        
        # Fit emblem nicely in center (approx 70% of size)
        target_size = int(sz * 0.72)
        emblem = src.copy()
        emblem.thumbnail((target_size, target_size), Image.Resampling.LANCZOS)
        ew, eh = emblem.size
        bg.paste(emblem, ((sz - ew) // 2, (sz - eh) // 2), emblem)
        
        bg.save(os.path.join("public", name), "PNG")
        bg.save(os.path.join("dist", name), "PNG")
        print(f"Created public/{name} ({sz}x{sz})")

if __name__ == "__main__":
    create_og_image()
    create_pwa_icons()
