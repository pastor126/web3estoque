--
-- PostgreSQL database dump
--

-- Dumped from database version 14.7
-- Dumped by pg_dump version 14.7

-- Started on 2023-05-24 08:06:44

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 3425 (class 1262 OID 43483)
-- Name: Estoque; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE "Estoque" WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Portuguese_Brazil.1252';


ALTER DATABASE "Estoque" OWNER TO postgres;

\connect "Estoque"

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 218 (class 1259 OID 43746)
-- Name: cliente; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cliente (
    id integer NOT NULL,
    nome character varying(50),
    ativo boolean DEFAULT true
);


ALTER TABLE public.cliente OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 43745)
-- Name: cliente_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.cliente_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cliente_id_seq OWNER TO postgres;

--
-- TOC entry 3426 (class 0 OID 0)
-- Dependencies: 217
-- Name: cliente_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.cliente_id_seq OWNED BY public.cliente.id;


--
-- TOC entry 220 (class 1259 OID 43754)
-- Name: compra; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.compra (
    id integer NOT NULL,
    data date DEFAULT CURRENT_DATE,
    quantidade integer,
    quant1 integer,
    cliente_id integer,
    produto_id integer,
    forma_pag_id integer,
    preco double precision
);


ALTER TABLE public.compra OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 43753)
-- Name: compra_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.compra_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.compra_id_seq OWNER TO postgres;

--
-- TOC entry 3427 (class 0 OID 0)
-- Dependencies: 219
-- Name: compra_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.compra_id_seq OWNED BY public.compra.id;


--
-- TOC entry 210 (class 1259 OID 43713)
-- Name: fabricante; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.fabricante (
    id integer NOT NULL,
    nome character varying(30),
    cnpj character varying(30),
    ativo boolean DEFAULT true
);


ALTER TABLE public.fabricante OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 43712)
-- Name: fabricante_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.fabricante_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.fabricante_id_seq OWNER TO postgres;

--
-- TOC entry 3428 (class 0 OID 0)
-- Dependencies: 209
-- Name: fabricante_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.fabricante_id_seq OWNED BY public.fabricante.id;


--
-- TOC entry 227 (class 1259 OID 43998)
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO postgres;

--
-- TOC entry 226 (class 1259 OID 43997)
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.failed_jobs_id_seq OWNER TO postgres;

--
-- TOC entry 3429 (class 0 OID 0)
-- Dependencies: 226
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- TOC entry 216 (class 1259 OID 43738)
-- Name: forma_pag; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.forma_pag (
    id integer NOT NULL,
    tipo character varying(30),
    ativo boolean DEFAULT true
);


ALTER TABLE public.forma_pag OWNER TO postgres;

--
-- TOC entry 215 (class 1259 OID 43737)
-- Name: forma_pag_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.forma_pag_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.forma_pag_id_seq OWNER TO postgres;

--
-- TOC entry 3430 (class 0 OID 0)
-- Dependencies: 215
-- Name: forma_pag_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.forma_pag_id_seq OWNED BY public.forma_pag.id;


--
-- TOC entry 222 (class 1259 OID 43973)
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 43972)
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO postgres;

--
-- TOC entry 3431 (class 0 OID 0)
-- Dependencies: 221
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- TOC entry 225 (class 1259 OID 43990)
-- Name: password_reset_tokens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_reset_tokens OWNER TO postgres;

--
-- TOC entry 229 (class 1259 OID 44010)
-- Name: personal_access_tokens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    expires_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.personal_access_tokens OWNER TO postgres;

--
-- TOC entry 228 (class 1259 OID 44009)
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.personal_access_tokens_id_seq OWNER TO postgres;

--
-- TOC entry 3432 (class 0 OID 0)
-- Dependencies: 228
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;


--
-- TOC entry 214 (class 1259 OID 43729)
-- Name: produto; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.produto (
    id integer NOT NULL,
    descricao character varying(30),
    qtde_estoque integer,
    valor_compra double precision,
    valor_venda double precision,
    fabricante_id integer,
    tipo_id integer,
    data date DEFAULT CURRENT_DATE NOT NULL,
    ativo boolean DEFAULT true,
    figura character varying(50)
);


ALTER TABLE public.produto OWNER TO postgres;

--
-- TOC entry 213 (class 1259 OID 43728)
-- Name: produto_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.produto_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.produto_id_seq OWNER TO postgres;

--
-- TOC entry 3433 (class 0 OID 0)
-- Dependencies: 213
-- Name: produto_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.produto_id_seq OWNED BY public.produto.id;


--
-- TOC entry 212 (class 1259 OID 43721)
-- Name: tipo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tipo (
    id integer NOT NULL,
    nome_tipo character varying(30),
    ativo boolean DEFAULT true
);


ALTER TABLE public.tipo OWNER TO postgres;

--
-- TOC entry 211 (class 1259 OID 43720)
-- Name: tipo_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tipo_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipo_id_seq OWNER TO postgres;

--
-- TOC entry 3434 (class 0 OID 0)
-- Dependencies: 211
-- Name: tipo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tipo_id_seq OWNED BY public.tipo.id;


--
-- TOC entry 224 (class 1259 OID 43980)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 223 (class 1259 OID 43979)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- TOC entry 3435 (class 0 OID 0)
-- Dependencies: 223
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- TOC entry 3222 (class 2604 OID 43749)
-- Name: cliente id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cliente ALTER COLUMN id SET DEFAULT nextval('public.cliente_id_seq'::regclass);


--
-- TOC entry 3224 (class 2604 OID 43757)
-- Name: compra id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.compra ALTER COLUMN id SET DEFAULT nextval('public.compra_id_seq'::regclass);


--
-- TOC entry 3213 (class 2604 OID 43716)
-- Name: fabricante id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fabricante ALTER COLUMN id SET DEFAULT nextval('public.fabricante_id_seq'::regclass);


--
-- TOC entry 3228 (class 2604 OID 44001)
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- TOC entry 3220 (class 2604 OID 43741)
-- Name: forma_pag id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.forma_pag ALTER COLUMN id SET DEFAULT nextval('public.forma_pag_id_seq'::regclass);


--
-- TOC entry 3226 (class 2604 OID 43976)
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- TOC entry 3230 (class 2604 OID 44013)
-- Name: personal_access_tokens id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);


--
-- TOC entry 3217 (class 2604 OID 43732)
-- Name: produto id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produto ALTER COLUMN id SET DEFAULT nextval('public.produto_id_seq'::regclass);


--
-- TOC entry 3215 (class 2604 OID 43724)
-- Name: tipo id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipo ALTER COLUMN id SET DEFAULT nextval('public.tipo_id_seq'::regclass);


--
-- TOC entry 3227 (class 2604 OID 43983)
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- TOC entry 3408 (class 0 OID 43746)
-- Dependencies: 218
-- Data for Name: cliente; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.cliente VALUES (4, 'Eu silva', false);
INSERT INTO public.cliente VALUES (2, 'Beltrano de Souza', false);
INSERT INTO public.cliente VALUES (3, 'Ciclano Carrara', true);
INSERT INTO public.cliente VALUES (6, 'Eu silva da Silva', true);
INSERT INTO public.cliente VALUES (1, 'Fulano de Silva', true);


--
-- TOC entry 3410 (class 0 OID 43754)
-- Dependencies: 220
-- Data for Name: compra; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.compra VALUES (14, NULL, 3, NULL, 3, 1, 3, 12);
INSERT INTO public.compra VALUES (15, NULL, 1, NULL, 1, 2, 5, 150);
INSERT INTO public.compra VALUES (16, NULL, 1, NULL, 6, 2, 4, 130);
INSERT INTO public.compra VALUES (13, NULL, 1, NULL, 3, 3, 6, 18);


--
-- TOC entry 3400 (class 0 OID 43713)
-- Dependencies: 210
-- Data for Name: fabricante; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.fabricante VALUES (1, 'Gedore', '1276.132/000001-98', true);
INSERT INTO public.fabricante VALUES (3, 'DWALT', '122.7654/000001-45', true);
INSERT INTO public.fabricante VALUES (4, 'Taurus', '222.33444/00001-57', true);
INSERT INTO public.fabricante VALUES (2, 'Starret', '96.132.7777/0001-98', true);
INSERT INTO public.fabricante VALUES (5, 'STARTOOLS', '386755059/-209293900', true);


--
-- TOC entry 3417 (class 0 OID 43998)
-- Dependencies: 227
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3406 (class 0 OID 43738)
-- Dependencies: 216
-- Data for Name: forma_pag; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.forma_pag VALUES (1, 'Dinheiro', false);
INSERT INTO public.forma_pag VALUES (4, 'Crédito VISA', true);
INSERT INTO public.forma_pag VALUES (2, 'Débito', false);
INSERT INTO public.forma_pag VALUES (3, 'Dinheiro', true);
INSERT INTO public.forma_pag VALUES (5, 'Pix', true);
INSERT INTO public.forma_pag VALUES (6, 'Crédito ELO', true);


--
-- TOC entry 3412 (class 0 OID 43973)
-- Dependencies: 222
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.migrations VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO public.migrations VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO public.migrations VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO public.migrations VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO public.migrations VALUES (5, '2023_05_21_132846_add_updated_at_to_produto', 1);


--
-- TOC entry 3415 (class 0 OID 43990)
-- Dependencies: 225
-- Data for Name: password_reset_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3419 (class 0 OID 44010)
-- Dependencies: 229
-- Data for Name: personal_access_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3404 (class 0 OID 43729)
-- Dependencies: 214
-- Data for Name: produto; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.produto VALUES (7, 'prego 20mm', 100, 0.1, 0.4, 4, 3, '2022-02-14', false, NULL);
INSERT INTO public.produto VALUES (8, 'Prego', 100, 0.2, 0.35, 4, 3, '2023-05-20', true, NULL);
INSERT INTO public.produto VALUES (9, 'Alicate Turquesa', 10, 17, 30, 5, 1, '2023-05-21', true, 'Ejo1f0wkQ5Pf0RbbylcZodCWp5SwAGrV31tLRhm9.jpg');
INSERT INTO public.produto VALUES (3, 'Alicate de corte 7''', 9, 14.5, 18, 1, 1, '2022-02-14', true, 'x3i0hN7dFFV7FqO5F8AoyZuYIJQrMWDnOXQuMm2N.jpg');
INSERT INTO public.produto VALUES (4, 'Lixa d''àgua 300', 10, 0.4, 0.8, 2, 3, '2023-04-13', false, NULL);
INSERT INTO public.produto VALUES (5, 'Parafuso 3 x 25', 250, 0.1, 0.25, 4, 3, '2023-04-13', false, NULL);
INSERT INTO public.produto VALUES (1, 'Chave alen 3''', 7, 8, 12, 1, 1, '2023-04-05', true, 'TC9qu6iE7zAoPjOr7pKLH5PgdjBJ5p2l9LUTIKbw.jpg');
INSERT INTO public.produto VALUES (2, 'Serra Circular', 8, 100, 130, 3, 5, '2021-03-01', true, '44j5cyuElcoKsN0trQB6TVmdLh1evneoeAMzqeIj.jpg');
INSERT INTO public.produto VALUES (6, 'Dobradiça N°2', 10, 25, 20, 4, 5, '2023-04-05', true, 'Yz1CQ2aJbDgfJxcrb0aF3NHF0fKVOzkOxbfkNEkz.jpg');


--
-- TOC entry 3402 (class 0 OID 43721)
-- Dependencies: 212
-- Data for Name: tipo; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tipo VALUES (1, 'Ferramentas', true);
INSERT INTO public.tipo VALUES (3, 'Miscelânea', true);
INSERT INTO public.tipo VALUES (2, 'Máquinas', false);
INSERT INTO public.tipo VALUES (4, 'Máquinas', true);
INSERT INTO public.tipo VALUES (5, 'Ferragens', true);


--
-- TOC entry 3414 (class 0 OID 43980)
-- Dependencies: 224
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3436 (class 0 OID 0)
-- Dependencies: 217
-- Name: cliente_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.cliente_id_seq', 6, true);


--
-- TOC entry 3437 (class 0 OID 0)
-- Dependencies: 219
-- Name: compra_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.compra_id_seq', 16, true);


--
-- TOC entry 3438 (class 0 OID 0)
-- Dependencies: 209
-- Name: fabricante_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.fabricante_id_seq', 5, true);


--
-- TOC entry 3439 (class 0 OID 0)
-- Dependencies: 226
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- TOC entry 3440 (class 0 OID 0)
-- Dependencies: 215
-- Name: forma_pag_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.forma_pag_id_seq', 6, true);


--
-- TOC entry 3441 (class 0 OID 0)
-- Dependencies: 221
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 5, true);


--
-- TOC entry 3442 (class 0 OID 0)
-- Dependencies: 228
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);


--
-- TOC entry 3443 (class 0 OID 0)
-- Dependencies: 213
-- Name: produto_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.produto_id_seq', 9, true);


--
-- TOC entry 3444 (class 0 OID 0)
-- Dependencies: 211
-- Name: tipo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tipo_id_seq', 5, true);


--
-- TOC entry 3445 (class 0 OID 0)
-- Dependencies: 223
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 1, false);


--
-- TOC entry 3240 (class 2606 OID 43752)
-- Name: cliente cliente_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cliente
    ADD CONSTRAINT cliente_pkey PRIMARY KEY (id);


--
-- TOC entry 3242 (class 2606 OID 43760)
-- Name: compra compra_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.compra
    ADD CONSTRAINT compra_pkey PRIMARY KEY (id);


--
-- TOC entry 3232 (class 2606 OID 43718)
-- Name: fabricante fabricante_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fabricante
    ADD CONSTRAINT fabricante_pkey PRIMARY KEY (id);


--
-- TOC entry 3252 (class 2606 OID 44006)
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- TOC entry 3254 (class 2606 OID 44008)
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- TOC entry 3238 (class 2606 OID 43744)
-- Name: forma_pag forma_pag_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.forma_pag
    ADD CONSTRAINT forma_pag_pkey PRIMARY KEY (id);


--
-- TOC entry 3244 (class 2606 OID 43978)
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- TOC entry 3250 (class 2606 OID 43996)
-- Name: password_reset_tokens password_reset_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);


--
-- TOC entry 3256 (class 2606 OID 44017)
-- Name: personal_access_tokens personal_access_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);


--
-- TOC entry 3258 (class 2606 OID 44020)
-- Name: personal_access_tokens personal_access_tokens_token_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);


--
-- TOC entry 3236 (class 2606 OID 43736)
-- Name: produto produto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produto
    ADD CONSTRAINT produto_pkey PRIMARY KEY (id);


--
-- TOC entry 3234 (class 2606 OID 43726)
-- Name: tipo tipo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipo
    ADD CONSTRAINT tipo_pkey PRIMARY KEY (id);


--
-- TOC entry 3246 (class 2606 OID 43989)
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- TOC entry 3248 (class 2606 OID 43987)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 3259 (class 1259 OID 44018)
-- Name: personal_access_tokens_tokenable_type_tokenable_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);


-- Completed on 2023-05-24 08:06:44

--
-- PostgreSQL database dump complete
--

