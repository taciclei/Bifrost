# 🌈⚡ Bifrost - PWA (Next.js) Dockerfile
# Frontend application consuming Hydra API

# =====================================
# Base Stage with pnpm
# =====================================
FROM node:22-alpine AS base

WORKDIR /app

# Enable pnpm
RUN corepack enable && corepack prepare pnpm@latest --activate

# Disable telemetry
ENV NEXT_TELEMETRY_DISABLED=1

# =====================================
# Dependencies Stage
# =====================================
FROM base AS deps

# Copy package files
COPY pwa/package.json pwa/pnpm-lock.yaml ./

# Install dependencies
RUN pnpm fetch --prod && \
    pnpm install --frozen-lockfile --offline --prod

# =====================================
# Development Dependencies
# =====================================
FROM base AS dev_deps

COPY pwa/package.json pwa/pnpm-lock.yaml ./
RUN pnpm install --frozen-lockfile

# =====================================
# Development Stage
# =====================================
FROM base AS dev

# Copy dependencies
COPY --from=dev_deps /app/node_modules ./node_modules

# Copy source code
COPY pwa .

# Expose Next.js port
EXPOSE 3000

# Development server with hot reload
CMD ["pnpm", "dev"]

# =====================================
# Builder Stage
# =====================================
FROM base AS builder

# Copy dependencies
COPY --from=deps /app/node_modules ./node_modules

# Copy source code
COPY pwa .

# Build arguments for environment variables
ARG NEXT_PUBLIC_API_ENTRYPOINT
ARG NEXT_PUBLIC_MERCURE_URL
ARG NEXTAUTH_URL
ARG NEXTAUTH_SECRET
ARG OIDC_SERVER_URL
ARG OIDC_CLIENT_ID

ENV NEXT_PUBLIC_API_ENTRYPOINT=${NEXT_PUBLIC_API_ENTRYPOINT}
ENV NEXT_PUBLIC_MERCURE_URL=${NEXT_PUBLIC_MERCURE_URL}

# Build Next.js application
RUN pnpm build

# =====================================
# Production Stage
# =====================================
FROM base AS prod

# Create non-root user
RUN addgroup -g 1001 -S nodejs && \
    adduser -S nextjs -u 1001

# Copy public assets
COPY --from=builder /app/public ./public

# Copy standalone build
COPY --from=builder --chown=nextjs:nodejs /app/.next/standalone ./
COPY --from=builder --chown=nextjs:nodejs /app/.next/static ./.next/static

USER nextjs

EXPOSE 3000

ENV NODE_ENV=production
ENV PORT=3000
ENV HOSTNAME="0.0.0.0"

# Health check
HEALTHCHECK --interval=10s --timeout=3s --retries=3 \
    CMD node -e "require('http').get('http://localhost:3000/', (r) => r.statusCode === 200 ? process.exit(0) : process.exit(1))"

# Start production server
CMD ["node", "server.js"]
