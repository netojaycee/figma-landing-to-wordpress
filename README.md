# Custom WordPress Landing Page Theme

This repository contains a custom WordPress theme built to replicate a Figma landing page design using HTML, Tailwind CSS, and JavaScript. The theme is designed to be lightweight, responsive, and customizable, making it ideal for landing pages or one-page websites.

## Table of Contents

- [Features](#features)
- [Technologies Used](#technologies-used)
- [Getting Started](#getting-started)
- [Installation](#installation)
- [Folder Structure](#folder-structure)
- [Customization](#customization)

## Features

- Fully responsive layout
- Built with Tailwind CSS for streamlined styling
- Custom JavaScript for interactivity (sidebar toggle, carousel, etc.)
- Simple structure for easy WordPress integration
- Organized codebase for easy modification and scalability

## Technologies Used

- **HTML5** - For structuring content
- **Tailwind CSS** - For fast, utility-first styling
- **JavaScript** - For interactive elements
- **WordPress** - CMS integration
- **Git/GitHub** - Version control and collaboration

## Getting Started

To get started with the project, clone this repository and follow the instructions below to set up your environment.

### Prerequisites

Make sure you have the following installed on your machine:

- Node.js and npm
- Git
- WordPress (local setup, e.g., Local by Flywheel or XAMPP)

## Installation

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/netojaycee/figma-landing-to-wordpress.git
   cd figma-landing-to-wordpress
   ```

2. **Install Dependencies**: Install Tailwind CSS and initialize it:
   ```bash
   npm install
   npx tailwindcss init
   ```

3. **Configure Tailwind CSS**: Update `tailwind.config.js` to include all HTML files for styling:
   ```javascript
   module.exports = {
     content: ["./**/*.html"],
     theme: {
       extend: {},
     },
     plugins: [],
   };
   ```

4. **Run Tailwind CSS Build Process:**
   ```bash
   npx tailwindcss -i ./style.css -o ./css/output.css --watch
   ```

5. **Set Up WordPress Theme:**
   - Copy the theme folder into `wp-content/themes` in your WordPress installation.
   - Activate the theme from the WordPress dashboard.

## Folder Structure

```plaintext
landing-page-wordpress-theme/
│
├── assets/                     # Images and other assets
├── css/
│   └── output.css              # Compiled Tailwind CSS file
├── index.html                  # HTML file (for testing layout before WP integration)
├── index.php                   # WordPress theme homepage template
├── functions.php               # Enqueues styles and scripts in WordPress
├── header.php                  # Header section for WordPress theme
├── footer.php                  # Footer section for WordPress theme
├── style.css                   # Base Tailwind CSS file with customizations
├── script.js                   # Custom JavaScript for interactivity
└── README.md
```

## Customization

- **HTML Structure**: Modify the HTML structure in `index.php`, `header.php`, and `footer.php` files as needed.
- **Tailwind CSS**: Customize classes and styles by editing `style.css` and running the Tailwind build process.
- **JavaScript**: Add or modify JavaScript functionality in `script.js` for interactive elements.

--- 

