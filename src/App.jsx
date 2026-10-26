import React, { useState, useEffect, useCallback } from 'react';
import Header from './components/Header';
import Hero from './components/Hero';
import ValueStatement from './components/ValueStatement';
import WorkflowShowcase from './components/WorkflowShowcase';
import ProductStories from './components/ProductStories';
import Capabilities from './components/Capabilities';
import Audience from './components/Audience';
import FAQ from './components/FAQ';
import FinalCTA from './components/FinalCTA';
import Footer from './components/Footer';
import ContactModal from './components/ContactModal';
import ChatWidget from './components/ChatWidget';
import PrivacyPolicy from './pages/PrivacyPolicy';
import TermsConditions from './pages/TermsConditions';
import ContactPage from './pages/ContactPage';

function parseCurrentRoute() {
  const hash = window.location.hash.replace(/^#\/?/, '').toLowerCase();
  const path = window.location.pathname.replace(/^\/|\/$/g, '').toLowerCase();

  const candidate = hash || path;
  if (candidate === 'privacy-policy' || candidate === 'privacy') return 'privacy-policy';
  if (candidate === 'terms-conditions' || candidate === 'terms') return 'terms-conditions';
  if (candidate === 'contact') return 'contact';
  return 'home';
}

export default function App() {
  const [currentRoute, setCurrentRoute] = useState(parseCurrentRoute);
  const [contactOpen, setContactOpen] = useState(false);

  const openContact = () => setContactOpen(true);
  const closeContact = () => setContactOpen(false);

  const navigate = useCallback((route) => {
    const cleanRoute = route.replace(/^\/|\/$/g, '');
    const validRoute =
      cleanRoute === 'privacy-policy' || cleanRoute === 'privacy'
        ? 'privacy-policy'
        : cleanRoute === 'terms-conditions' || cleanRoute === 'terms'
        ? 'terms-conditions'
        : cleanRoute === 'contact'
        ? 'contact'
        : 'home';

    setCurrentRoute(validRoute);
    const targetUrl = validRoute === 'home' ? '/' : `/${validRoute}`;
    
    // Update browser URL and history
    if (window.location.pathname !== targetUrl && window.location.hash !== `#/${validRoute}`) {
      try {
        window.history.pushState({ route: validRoute }, '', targetUrl);
      } catch (e) {
        // Fallback to hash navigation if pushState is restricted
        window.location.hash = targetUrl;
      }
    }

    // Scroll to top
    window.scrollTo({ top: 0, behavior: 'instant' });

    // Update document title
    if (validRoute === 'privacy-policy') {
      document.title = 'Privacy Policy | DAOZ360';
    } else if (validRoute === 'terms-conditions') {
      document.title = 'Terms & Conditions | DAOZ360';
    } else if (validRoute === 'contact') {
      document.title = 'Contact Us | DAOZ360';
    } else {
      document.title = 'DAOZ360 | Social Media Management';
    }
  }, []);

  // Listen to browser back/forward buttons & hash changes
  useEffect(() => {
    const handlePopState = () => {
      const nextRoute = parseCurrentRoute();
      setCurrentRoute(nextRoute);
      window.scrollTo({ top: 0, behavior: 'instant' });
    };

    window.addEventListener('popstate', handlePopState);
    window.addEventListener('hashchange', handlePopState);
    return () => {
      window.removeEventListener('popstate', handlePopState);
      window.removeEventListener('hashchange', handlePopState);
    };
  }, []);

  return (
    <div className="site-wrapper">
      <Header
        currentRoute={currentRoute}
        onNavigate={navigate}
        onOpenContact={openContact}
      />

      {currentRoute === 'home' && (
        <main id="main-content">
          <Hero onOpenContact={openContact} />
          <ValueStatement />
          <WorkflowShowcase />
          <ProductStories onOpenContact={openContact} />
          <Capabilities />
          <Audience />
          <FAQ />
          <FinalCTA onOpenContact={openContact} />
        </main>
      )}

      {currentRoute === 'privacy-policy' && (
        <main id="main-content">
          <PrivacyPolicy onNavigate={navigate} />
        </main>
      )}

      {currentRoute === 'terms-conditions' && (
        <main id="main-content">
          <TermsConditions onNavigate={navigate} />
        </main>
      )}

      {currentRoute === 'contact' && (
        <main id="main-content">
          <ContactPage onNavigate={navigate} />
        </main>
      )}

      <Footer
        onOpenContact={openContact}
        onNavigate={navigate}
      />

      {/* Floating Chat Assistant Widget */}
      <ChatWidget onNavigate={navigate} />

      {/* Modal Contact */}
      <ContactModal isOpen={contactOpen} onClose={closeContact} />
    </div>
  );
}
